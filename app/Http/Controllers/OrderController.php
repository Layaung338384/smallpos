<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\AdminPayment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class OrderController extends Controller
{
    public function create()
    {
        $products = Product::all();
        $payments = AdminPayment::all();
        return view('order.create', compact('products', 'payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'product_id' => 'required|exists:products,id',
            'admin_payment_id' => 'required|exists:admin_payments,id',
            'quantity' => 'required|integer|min:1',
            'payment_amount' => 'required|numeric|min:0',
        ]);

        $product = Product::find($request->product_id);
        $admin = AdminPayment::find($request->admin_payment_id);

        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock!');
        }

        $product->stock -= $request->quantity;
        $product->save();

        $admin->total_received += $request->payment_amount;
        $admin->save();

        Order::create($request->all());

        Alert::success('Success', 'Order Created Successfully!');
        return to_route('orders.index');
    }

    public function index()
    {
        $orders = Order::with(['product', 'adminPayment'])->latest()->paginate(20);
        return view('admin.orders', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $product = Product::find($order->product_id);
        $admin = AdminPayment::find($order->admin_payment_id);

        $product->stock += $order->quantity;
        $product->save();

        $admin->total_received -= $order->payment_amount;
        $admin->save();

        $order->delete();

        Alert::success('Success', 'Order Cancle Successfully!');
        return back();
    }

    public function downloadPdf()
    {
        $orders = Order::with(['product', 'adminPayment'])->latest()->get();

        $pdf = PDF::loadView('admin.orders_pdf', compact('orders'));
        return $pdf->download('all_orders.pdf');
    }

}

