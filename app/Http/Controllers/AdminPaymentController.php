<?php

// namespace App\Http\Controllers;

// use App\Models\AdminPayment;
// use Illuminate\Http\Request;

// class AdminPaymentController extends Controller
// {
//     public function index()
//     {
//         $payments = AdminPayment::all();
//         return view('admin.payments', compact('payments'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'phone' => 'required'
//         ]);

//         AdminPayment::create($request->only('name', 'phone'));

//         return back()->with('success', 'Admin payment account added!');
//     }
// }


namespace App\Http\Controllers;

use App\Models\AdminPayment;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function index()
    {
        $payments = AdminPayment::paginate(3);
        return view('admin.payments', compact('payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        AdminPayment::create($request->only('name', 'phone'));

        Alert::success('Success', 'Admin Payment Created Successfully!');
        return back();

    }

    public function edit($id) {
        $payment = AdminPayment::findOrFail($id);
        return view('admin.payment_edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        $payment = AdminPayment::findOrFail($id); // manually get the payment
        $payment->update($request->only('name', 'phone'));

        Alert::success('Success', 'Admin Payment Updated Successfully!');
        return to_route('payments.index');
    }
        public function destroy($id) {
            $payment = AdminPayment::findOrFail($id);
            $payment->delete();
            Alert::success('Success', 'Admin Payment Deleted Successfully!');
            return back();
    }
}
