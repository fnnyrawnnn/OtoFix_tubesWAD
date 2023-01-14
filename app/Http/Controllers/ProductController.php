<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products=Product::orderBy('id', 'desc') ->get();
        $products=Product::all();
        return view('admin.indexadmin', compact('products'));
        // return 'test';
    }

    public function show($id)
    {
        $products = Product::find($id);
        return view('admin.indexadmin', compact('products'));
    }

    public function create()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $imgName = $request->img_path->getClientOriginalName() . '-' . time()
                    . '.' . $request->img_path->extension();
        $request->img_path->move(public_path('img'), $imgName);

        $random_id = mt_rand(1000, 9999);

        Product::create([

            'id' => $random_id,
            'email' => $request -> email,
            'name' => $request -> name,
            'deskripsi' => $request -> desc,    
            'services' => $request -> services,    
            'distance' => $request -> distance,
            'price' => $request -> price,
            'image' => $imgName
        ]);

        return redirect('/indexadmin');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.update', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = product::find($id);

        $imgName = $product->img_path;
        if($request->img_path) {
            $imgName = $request->img_path->getClientOriginalName() . '-' . time()
                    . '.' . $request->img_path->extension();
            $request->img_path->move(public_path('img'), $imgName);
        } 

        Product::find($id)->update([
            
            'email' => $request -> email,
            'name' => $request -> name,
            'deskripsi' => $request -> desc,    
            'services' => $request -> services,    
            'distance' => $request -> distance,
            'price' => $request -> price,
            'image' => $imgName
        ]);

        return redirect('/Update');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('/Listcar');
    }
}
