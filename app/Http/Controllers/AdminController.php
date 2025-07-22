<?php
namespace App\Http\Controllers;

use App\Models\AdminPayment;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexx()
    {
        $payments = AdminPayment::select('name', 'total_received')->get();
        $products = Product::select('size', 'stock')->get();
        $ordersCount = Order::count(); // count all customer orders
        return view('admin.dashboard', compact('payments', 'products', 'ordersCount'));
    }
}

