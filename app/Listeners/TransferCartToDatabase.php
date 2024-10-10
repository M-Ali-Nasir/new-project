<?php

namespace App\Listeners;

use App\Models\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Session;

class TransferCartToDatabase
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {


        // Ensure that the user is set correctly in the event
        $user = $event->user;

        $sessionCart = Session::get('cart', []);

        foreach ($sessionCart as $productId => $cartItem) {
            // Check if the item already exists in the database for the logged-in user
            $existingCartItem = Cart::where('user_id', $user->id)
                ->where('product_id', $cartItem['product_id'])
                ->first();

            if ($existingCartItem) {
                // If it exists, update the quantity
                $existingCartItem->quantity += $cartItem['quantity'];
                $existingCartItem->save();
            } else {
                // Otherwise, create a new cart entry
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                    'price' => $cartItem['price'],
                ]);
            }
        }

        // Clear the session cart after transferring
        Session::forget('cart');
    }
}
