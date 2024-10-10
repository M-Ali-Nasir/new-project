<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //dashboard page
    public function dashboardView()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            $user = Auth::user();
            return view('admin.dashboard', compact('user'));
        }
    }

    /**
     * Orders functionality
     */

    //process order pages

    public function processOrders()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            $user = Auth::user();
            $orders = Order::with(['orderDetails', 'orderStatus', 'user'])
                ->whereHas('orderStatus', function ($query) {
                    $query->whereIn('status', ['processing', 'shipped']);
                })
                ->get();

            return view('admin.proccessOrder', compact('user', 'orders'));
        }
    }


    //pending orders pages

    public function pendingOrders()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            $user = Auth::user();

            $pendingOrders = Order::join('order_statuses', 'orders.id', '=', 'order_statuses.order_id')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->where('order_statuses.status', 'processing')
                ->select('orders.*', 'users.name', 'users.email', 'order_statuses.status')
                ->get();

            return view('admin.pendingOrders', compact('user', 'pendingOrders'));
        }
    }


    //shipped orders pages

    public function shippedOrders()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            $user = Auth::user();

            $shippedOrders = Order::join('order_statuses', 'orders.id', '=', 'order_statuses.order_id')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->where('order_statuses.status', 'shipped')
                ->select('orders.*', 'users.name', 'users.email', 'order_statuses.status')
                ->get();

            return view('admin.shippedOrders', compact('user', 'shippedOrders'));
        }
    }


    //completed orders pages

    public function completedOrders()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            $user = Auth::user();
            $completedOrders = Order::join('order_statuses', 'orders.id', '=', 'order_statuses.order_id')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->where('order_statuses.status', 'completed')
                ->select('orders.*', 'users.name', 'users.email', 'order_statuses.status')
                ->get();
            return view('admin.completedOrders', compact('user', 'completedOrders'));
        }
    }


    //history orders pages

    public function orderHistory()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            $user = Auth::user();

            $orders = Order::join('order_statuses', 'orders.id', '=', 'order_statuses.order_id')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.*', 'users.name', 'users.email', 'order_statuses.status')
                ->get();
            return view('admin.orderHistory', compact('user', 'orders'));
        }
    }

    //single order page

    public function singleOrderView($order_id)
    {
        if (Auth::user() && Auth::user()->role == 'admin') {


            $user = Auth::user();
            $order = Order::where('id', $order_id)->with('user')->first();
            $order_details = OrderDetail::with('product')
                ->where('order_id', $order_id)
                ->get();

            $order_status = OrderStatus::where('order_id', $order_id)->first();


            return view('admin.orderView', compact('user', 'order', 'order_details', 'order_status'));
        }
    }

    // ship the order
    public function markAsShipped($id)
    {
        if (Auth::user() && Auth::user()->role == 'admin') {


            $orderStatus = OrderStatus::where('order_id', $id)->first();

            if ($orderStatus && $orderStatus->status === 'processing') {
                $orderStatus->status = 'shipped';
                $orderStatus->save();

                return redirect()->back()->with('success', 'Order status changed to shipped.');
            }

            return redirect()->back()->with('error', 'Order status must be processing to change it to shipped.');
        }
    }


    //complete the order
    public function markAsCompleted($id)
    {
        if (Auth::user() && Auth::user()->role == 'admin') {



            $orderStatus = OrderStatus::where('order_id', $id)->first();

            if ($orderStatus && $orderStatus->status === 'shipped') {
                $orderStatus->status = 'completed';
                $orderStatus->save();

                return redirect()->back()->with('success', 'Order status changed to completed.');
            }

            return redirect()->back()->with('error', 'Order status must be shipped to change it to completed.');
        }
    }


    //all customer page

    public function allCustomersView()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {


            $user = Auth::user();
            $customers = User::where('role', 'customer')->get();

            return view('admin.allCustomers', compact('user', 'customers'));
        }
    }

    //all comments page

    public function allCommentsView()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            $user = Auth::user();
            $comments = Comment::with('product', 'user')->get();


            return view('admin.allComments', compact('user', 'comments'));
        }
    }
}
