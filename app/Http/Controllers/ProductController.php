<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Variations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //product view
    public function productView($id)
    {
        $product = Product::where('id', $id)->with('variations')->first();
        return view('pages.product.product', compact('product'));
    }


    // product comment page
    public function commentView($id)
    {
        $product = Product::where('id', $id)->first();
        $comments = Comment::where('product_id', $product->id)->with('user')->get();
        return view('pages.product.comments', compact('product', 'comments'));
    }



    //save product comment
    public function createComment(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|max:1000|string',
        ]);

        if (Auth::user()) {

            $newComment = new Comment();

            $newComment->product_id = $request->product_id;
            $newComment->user_id = $request->user_id;
            $newComment->comment = $validated['comment'];

            $newComment->save();
        }

        return redirect()->back();
    }



    //add to cart
    public function addToCart(Request $request)
    {


        $product = Product::find($request->product_id);
        $variation_id = $request->variation;
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // If the user is logged in, store the cart in the database
        if (Auth::check()) {
            $cartItem = Cart::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->where('variation_id', $variation_id)
                ->first();

            if ($cartItem && ($cartItem->return_date == $request->return_date)) {

                $cartItem->quantity += $request->quantity;
                $cartItem->save();
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                    'price' => $product->price,
                    'return_date' => $request->return_date ?? null,
                    'variation_id' => $variation_id,
                ]);
            }
        } else {
            // If the user is not logged in, store the cart in the session
            $cart = Session::get('cart', []);

            if (isset($cart[$product->id]) && ($cart[$product->id]['return_date'] == $request->return_date) && ($cart[$product->id]['variation_id'] == $variation_id)) {
                $cart[$product->id]['quantity'] += $request->quantity;
            } else {
                $cart[$product->id] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'quantity' => $request->quantity,
                    'price' => $product->price,
                    'return_date' => $request->return_date ?? null,
                    'variation_id' => $variation_id,
                ];
            }

            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    //delete from cart
    public function deleteFromCart($id)
    {
        $user = Auth::user();
        if (Auth::user()) {
            Cart::where('user_id', $user->id)->where('id', $id)->delete();
        } else {
            $cart = Session::get('cart', []);

            if (count($cart) > 0) {

                foreach ($cart as $index => $item) {

                    if ($item["product_id"] == $id) {
                        unset($cart[$index]);
                        break;
                    }
                }
            }

            $cart = array_values($cart);
            Session::put('cart', $cart);
        }
        return redirect()->back();
    }


    //all product page
    public function allProductView()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $products = Product::with('category')->get();
            return view('admin.products.allProducts', compact('user', 'products'));
        }
    }


    //create product page
    public function createProductView()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $categories = ProductCategory::all();
            return view('admin.products.createProduct', compact('user', 'categories'));
        }
    }

    //edit product page
    public function editProductView($id)
    {
        if (Auth::user()) {
            $user = Auth::user();
            $categories = ProductCategory::all();
            $product = Product::where('id', $id)->first();
            return view('admin.products.editProduct', compact('user', 'product', 'categories'));
        }
    }


    //inventory page
    public function inventoryView()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $products = Product::with(['variations', 'category'])->get();
            return view('admin.products.inventory', compact('user', 'products'));
        }
    }

    //out of stock page
    public function outOfStockView()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $products = Product::where('quantity', 0)->with('category')->get();
            return view('admin.products.outOfStock', compact('user', 'products'));
        }
    }


    //create Product

    public function createProduct(Request $request)
    {


        // Save the product image to storage
        $imagePath = $request->file('image')->storeAs('imgs', $request->file('image')->getClientOriginalName(), 'public');

        // Create the Product record
        $product = Product::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'shipping_area' => $request->shipping_area,
            'category_id' => $request->category_id,
            'for_rent' => $request->has('isForRent') ? true : false,
        ]);

        // Save each variation (size and color combination)
        foreach ($request->size as $size) {
            foreach ($request->color as $color) {
                Variations::create([
                    'product_id' => $product->id,
                    'size' => $size,
                    'color' => $color,
                ]);
            }
        }

        // Redirect with a success message
        return redirect()->route('all-product-view');
    }

    //edit product
    public function editProduct(Request $request, $id)
    {

        $product = Product::findOrFail($id);


        if ($request->hasFile('image')) {

            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }


            $imagePath = $request->file('image')->storeAs('imgs', $request->file('image')->getClientOriginalName(), 'public');
            $product->image = $imagePath;
        }


        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->shipping_area = $request->input('shipping_area');
        $product->category_id = $request->input('category_id');
        $product->for_rent = $request->has('isForRent') ? true : false;
        $product->save();


        $product->variations()->delete();


        foreach ($request->input('size', []) as $size) {
            foreach ($request->input('color', []) as $color) {
                Variations::create([
                    'product_id' => $product->id,
                    'size' => $size,
                    'color' => $color,
                ]);
            }
        }

        return redirect()->route('all-product-view');
    }

    //delete product
    public function deleteProduct($id)
    {

        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->variations()->delete();

        $product->delete();

        return redirect()->back();
    }
}
