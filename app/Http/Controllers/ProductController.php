<?php

// namespace App\Http\Controllers;

// use App\Models\Product;
// use Illuminate\Http\Request;

// class ProductController extends Controller
// {
//     public function index()
//     {
//         $products = Product::all();
//         return view('admin.products', compact('products'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'size' => 'required|string',
//             'stock' => 'required|integer|min:1'
//         ]);

//         Product::create($request->only('size', 'stock'));

//         return back()->with('success', 'Shirt size added!');
//     }
// }


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::paginate(4);
        return view('admin.products', compact('products'));
    }

    // Store new product
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'size' => 'required|string',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->only('size', 'stock'));

        Alert::success('Success', 'Product Created Successfully!');
        return back();
    }

    //edit page
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_edit', compact('product'));
    }

    //update the data
    public function update(Request $request, $id)
    {
        $request->validate([
            'size' => 'required|string',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only('size', 'stock'));

        Alert::success('Success', 'Product Updated Successfully!');
        return redirect()->route('products.index');
    }

    //delete the data
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Alert::success('Success', 'Product Deleted Successfully!');
        return back();
    }


}


