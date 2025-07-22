<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\AdminPayment;
use Livewire\Component;

class OrderForm extends Component
{
    public $customer_name, $phone, $address, $product_id, $admin_payment_id, $quantity = 1, $payment_amount;
    public $products = [], $payments = [];

    public function mount()
    {
        $this->products = Product::all();
        $this->payments = AdminPayment::all();
    }

    public function submit()
    {
        $this->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'product_id' => 'required|exists:products,id',
            'admin_payment_id' => 'required|exists:admin_payments,id',
            'quantity' => 'required|integer|min:1',
            'payment_amount' => 'required|numeric|min:0',
        ]);

        $product = Product::find($this->product_id);
        $admin = AdminPayment::find($this->admin_payment_id);

        if ($product->stock < $this->quantity) {
            session()->flash('error', 'Not enough stock!');
            return;
        }

        $product->stock -= $this->quantity;
        $product->save();

        $admin->total_received += $this->payment_amount;
        $admin->save();

        Order::create([
            'customer_name' => $this->customer_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'product_id' => $this->product_id,
            'admin_payment_id' => $this->admin_payment_id,
            'quantity' => $this->quantity,
            'payment_amount' => $this->payment_amount,
        ]);

        session()->flash('success', 'Order placed!');
        $this->reset(['customer_name', 'phone', 'address', 'product_id', 'admin_payment_id', 'quantity', 'payment_amount']);
    }

    public function render()
    {
        return view('livewire.admin.order-form')->layout('layouts.app');
    }
}
