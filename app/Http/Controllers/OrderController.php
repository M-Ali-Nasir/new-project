<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Place an order and save order details.
     */




    public function placeOrder(Request $request)
    {
        $isCartOrder = $request->input('iscart', false);
        $userId = Auth::id();
        $orderProducts = [];
        $orderType = "purchase";

        if ($userId) {
            // Get products from cart for logged-in users
            if ($isCartOrder) {
                $orderProducts = Cart::where('user_id', $userId)->with('product')->get()->map(function ($cartItem) {
                    return [
                        'product_id' => $cartItem->product_id,
                        'quantity' => $cartItem->quantity,
                        'price' => $cartItem->product->price,
                        'return_date' => $cartItem->return_date,
                        'variation_id' => $cartItem->variation_id,
                    ];
                })->toArray();
            } else {
                // Single product order for logged-in user
                if (isset($request->return_date)) {
                    $orderType = "rent";
                }
                $productId = $request->input('product_id');
                $quantity = $request->input('total_quantity', 1);
                $product = Product::findOrFail($productId);
                $orderProducts[] = [
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'return_date' => $request->return_date ?? null,
                    'variation_id' => $request->vatiation_id,
                ];
            }
        } else {
            // Guest user
            $cartSession = Session::get('cart', []);
            if ($isCartOrder) {
                $orderProducts = collect($cartSession)->map(function ($cartItem) {
                    return [
                        'product_id' => $cartItem['product_id'],
                        'quantity' => $cartItem['quantity'],
                        'price' => $cartItem['price'],
                        'return_date' => $cartItem['return_date'],
                        'variation_id' => $cartItem['variation_id'],
                    ];
                })->toArray();
            } else {
                // Single product order for guest user
                if (isset($request->return_date)) {
                    $orderType = "rent";
                }
                $productId = $request->input('product_id');
                $quantity = $request->input('total_quantity', 1);
                $product = Product::findOrFail($productId);
                $orderProducts[] = [
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'return_date' => $request->return_date ?? null,
                    'variation_id' => $request->variation_id,
                ];
            }
        }

        // Calculate total price and create order
        $totalPrice = collect($orderProducts)->sum(fn($item) => $item['price'] * $item['quantity']);
        $order = Order::create([
            'user_id' => $userId,
            'price' => $totalPrice,
            'quantity' => collect($orderProducts)->sum('quantity'),
            'order_type' => $orderType,
        ]);

        // Save order details for each item in the order
        foreach ($orderProducts as $item) {
            //dd($item['product_id']);
            OrderDetail::create([
                'order_id' => $order->id,
                'billing_first_name' => $request->input('fname'),
                'billing_last_name' => $request->input('lname'),
                'billing_email' => $request->input('email'),
                'billing_mobile_no' => $request->input('phone'),
                'billing_address' => $request->input('address'),
                'billing_country' => $request->input('country'),
                'billing_state' => $request->input('state'),
                'billing_city' => $request->input('city'),
                'billing_zip_code' => $request->input('zip'),
                'shipping_first_name' => $request->has('shippingCheckbox') ? $request->input('shipping_fname') : null,
                'shipping_last_name' => $request->has('shippingCheckbox') ? $request->input('shipping_lname') : null,
                'shipping_email' => $request->has('shippingCheckbox') ? $request->input('shipping_email') : null,
                'shipping_mobile_no' => $request->has('shippingCheckbox') ? $request->input('shipping_phone') : null,
                'shipping_address' => $request->has('shippingCheckbox') ? $request->input('shipping_address') : null,
                'shipping_country' => $request->has('shippingCheckbox') ? $request->input('shipping_country') : null,
                'shipping_state' => $request->has('shippingCheckbox') ? $request->input('shipping_state') : null,
                'shipping_city' => $request->has('shippingCheckbox') ? $request->input('shipping_city') : null,
                'shipping_zip_code' => $request->has('shippingCheckbox') ? $request->input('shipping_zip') : null,
                'product_id' => $item['product_id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'return_date' => $item['return_date'],
                'variation_id' => $item['variation_id'],

            ]);

            $product = Product::where('id', $item['product_id'])->first();
            $product->quantity -= $item['quantity'];
            $product->save();
        }




        OrderStatus::create([
            'order_id' => $order->id,
            'status' => 'processing'
        ]);

        // Clear cart for cart orders
        if ($isCartOrder) {
            $userId ? Cart::where('user_id', $userId)->delete() : Session::forget('cart');
        }

        // Send confirmation email
        Mail::to($request->input('email'))->send(new OrderConfirmationMail($order));

        // Redirect to success page
        return redirect()->route('order-success', ['order_id' => $order->id])
            ->with('success', 'Order placed successfully!');
    }




    //order success page
    public function orderSuccessView($order_id)
    {

        return view('pages.thankyou', ['orderid' => $order_id]);
    }
}
