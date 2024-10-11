<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Variations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{


    /**
     * All pages view functions
     */

    //Home page
    public function homeView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::with('variations')->take(20)->get();

        $search = $request->input('search');

        if ($search) {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }

        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('home', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('home', compact('products', 'dbcart'));
        }
    }

    //about page
    public function aboutView(Request $request)
    {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::with('variations')->take(20)->get();

        $search = $request->input('search');

        if ($search) {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }

        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.about', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.about', compact('products', 'dbcart'));
        }
    }

    // gallery Page
    public function galleryView(Request $request)
    {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::with('variations')->take(20)->get();


        $search = $request->input('search');

        if ($search) {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }


        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.gallery', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.gallery', compact('products', 'dbcart'));
        }
    }

    //contact page
    public function contactView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::with('variations')->take(20)->get();


        $search = $request->input('search');

        if ($search) {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }

        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.contact', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.contact', compact('products', 'dbcart'));
        }
    }

    //blogs page

    public function blogsView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.blogs', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.blogs', compact('products', 'dbcart'));
        }
    }

    //login page

    public function loginView()
    {
        return view('pages.login');
    }

    //signup page
    public function signupView()
    {
        return view('pages.signUp');
    }

    //rent page

    public function rentView(Request $request)
    {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('for_rent',1)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('for_rent',1)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.rent', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.rent', compact('products', 'dbcart'));
        }
    }

    //ladies top page
    public function ladiesTopView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 1)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 1)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.ladiesTop', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.ladiesTop', compact('products', 'dbcart'));
        }
    }

    // women heels page
    public function heelsView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 2)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 2)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.ladiesHeels', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.ladiesHeels', compact('products', 'dbcart'));
        }
    }

    // ladiesShoes page
    public function ladiesShoesView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 3)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 3)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.ladiesShoes', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.ladiesShoes', compact('products', 'dbcart'));
        }
    }

    //ladies flat page
    public function ladiesFlatsView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 4)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 4)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.ladiesFlats', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.ladiesFlats', compact('products', 'dbcart'));
        }
    }

    //t-shirts page
    public function tShirtsView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 5)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 5)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.t-shirts', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.t-shirts', compact('products', 'dbcart'));
        }
    }

    //diner suit page
    public function dinerSuitView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 6)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 6)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.maleSuits', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.maleSuits', compact('products', 'dbcart'));
        }
    }

    //mens shoes page
    public function mensShoesView(Request $request)
    {



        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 7)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 7)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.boyShoes', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.boyShoes', compact('products', 'dbcart'));
        }
    }

    //mens leather shoes page
    public function mensLeatherShoesView(Request $request)
    {



        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 8)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 8)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.maleLeatherShoes', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.maleLeatherShoes', compact('products', 'dbcart'));
        }
    }

    //lipsticks page
    public function lipsticksView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 9)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 9)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.lipsticks', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.lipsticks', compact('products', 'dbcart'));
        }
    }

    //maskara page
    public function maskaraView(Request $request)
    {



        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 10)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 10)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.maskara', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.maskara', compact('products', 'dbcart'));
        }
    }

    //liner page
    public function linerView(Request $request)
    {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 11)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 11)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.liner', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.liner', compact('products', 'dbcart'));
        }
    }

    //blush on page
    public function blushOnView(Request $request)
    {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 12)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 12)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.blushOn', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.blushOn', compact('products', 'dbcart'));
        }
    }

    //eyeshadow page
    public function eyeshadowsView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 13)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 13)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.eyeshadow', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.eyeshadow', compact('products', 'dbcart'));
        }
    }

    //brushes page
    public function brushesView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 14)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 14)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.brushes', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.brushes', compact('products', 'dbcart'));
        }
    }

    //perfuems page
    public function perfuemsView(Request $request)
    {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 15)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 15)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.perfumes', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.perfumes', compact('products', 'dbcart'));
        }
    }

    //anklets page
    public function ankletsView(Request $request)
    {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 16)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 16)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.anklet', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.anklet', compact('products', 'dbcart'));
        }
    }

    //braceltes page
    public function bracelatesView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 17)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 17)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.bracelates', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.bracelates', compact('products', 'dbcart'));
        }
    }

    //pendents page
    public function pendentsView(Request $request)
    {



        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 18)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 18)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.pendents', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.pendents', compact('products', 'dbcart'));
        }
    }

    //rings page
    public function ringsView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 19)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 19)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.rings', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.rings', compact('products', 'dbcart'));
        }
    }

    //earings page
    public function earingsView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 20)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 20)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.earings', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.earings', compact('products', 'dbcart'));
        }




        return view('pages.earings');
    }

    //watches page
    public function watchesView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 21)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 21)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.watches', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.watches', compact('products', 'dbcart'));
        }
    }

    //vases page
    public function vasesView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 22)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 22)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.vase', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.vase', compact('products', 'dbcart'));
        }
    }

    //paintings page
    public function paintingsView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 23)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 23)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.paintings', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.paintings', compact('products', 'dbcart'));
        }
    }

    //clocks page
    public function clocksView(Request $request)
    {


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
            Session::put('cart', $cart);
        }

        // Loop through each cart item and merge with variation details
        foreach ($cart as $index => $item) {
            // Retrieve the variation details from the Variations model
            $variation = Variations::find($item['variation_id']);

            if ($variation) {
                // Merge the variation details into the cart item
                $cart[$index] = array_merge($item, [
                    'color' => $variation->color,
                    'size' => $variation->size,

                ]);
            }
        }

        // Optionally, update the session with the merged cart if you want to save it
        Session::put('cart', $cart);

        $dbcart = [];
        $user = Auth::user();

        $products = Product::where('category_id', 24)->with('variations')->take(20)->get();
        $search = $request->input('search');

        if ($search) {
            $products = Product::where('category_id', 22)->where('name', 'LIKE', '%' . $search . '%')->with('variations')->take(20)->get();
        }
        if ($user) {
            $cart = Cart::with('product')
                ->join('variations', 'carts.variation_id', '=', 'variations.id')
                ->where('carts.user_id', Auth::id())
                ->select('carts.*', 'variations.color', 'variations.size')
                ->get();
            $dbcart = $cart;
            return view('pages.clocks', compact('user', 'dbcart', 'products'));
        } else {
            $dbcart = $cart;
            return view('pages.clocks', compact('products', 'dbcart'));
        }
    }

    //checkout page
    public function checkoutView(Request $request, $product_id, $iscart)
    {

        $return_date = null;
        if (!$iscart) {
            if (isset($request->return_date)) {
                $return_date = $request->return_date;
            }
        }

        $dbcart = [];
        $user = Auth::user();
        $varition_id = null;
        if (preg_match('/^\d{4}-\d{2}-\d{2}\?variation_id=\d+$/', $request->return_date)) {

            list($return_date, $variationQuery) = explode('?', $request->return_date);

            list($key, $variation_id) = explode('=', $variationQuery);
            $variation = Variations::where('id', $variation_id)->first();
        } elseif (isset($request->variation_id)) {
            $variation = Variations::where('id', $request->variation_id)->first();
        }

        if ($user) {

            if ($iscart == 1) {
                $cart = Cart::with('product')
                    ->join('variations', 'carts.variation_id', '=', 'variations.id')
                    ->where('carts.user_id', Auth::id())
                    ->select('carts.*', 'variations.color', 'variations.size')
                    ->get();
                if (!empty($cart)) {
                    $totalPrice = 0;
                    foreach ($cart as $item) {
                        $totalPrice += $item->price * $item->quantity;
                    }

                    $dbcart = $cart;
                    return view('pages.checkout', compact('user', 'dbcart', 'product_id', 'iscart', 'cart', 'totalPrice', 'return_date'));
                } else {
                    return redirect()->back();
                }
            } else {
                $product = Product::where('id', $product_id)->first();
                return view('pages.checkout', compact('user', 'dbcart', 'product_id', 'iscart', 'product', 'return_date', 'variation'));
            }
        } else {
            $cart = Session::get('cart');
            if ($iscart == 1) {
                if (count($cart) > 0) {
                    $productIds = array_column($cart, 'product_id');
                    $products = Product::whereIn('id', $productIds)->get();

                    $cartWithDetails = [];

                    foreach ($cart as $item) {
                        $product = $products->firstWhere('id', $item['product_id']);
                        $variation = Variations::find($item['variation_id']);

                        if ($product) {
                            $item = array_merge($item, [
                                'name' => $product->name,
                                'description' => $product->description,
                                'price' => $product->price,
                            ]);
                        }
                        if ($variation) {
                            $item = array_merge($item, [
                                'color' => $variation->color,
                                'size' => $variation->size,
                            ]);
                        }
                        $cartWithDetails[] = $item;
                    }
                    $cart = $cartWithDetails;

                    $totalPrice = 0;
                    foreach ($cart as $item) {
                        $totalPrice += $item['price'] * $item['quantity'];
                    }
                    return view('pages.checkout', compact('product_id', 'iscart', 'cart', 'totalPrice', 'return_date'));
                } else {
                    return redirect()->back();
                }
            } else {
                $product = Product::where('id', $product_id)->first();
                return view('pages.checkout', compact('product_id', 'iscart', 'product', 'return_date', 'variation'));
            }
        }
    }

    public function sendContactUsMail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $messageContent = $request->input('message');

        // Send the email
        Mail::to('trendlinepurchaseinfo@gmail.com')->send(new ContactUsMail($name, $phone, $messageContent, $email));

        return redirect()->route('home');
    }
}
