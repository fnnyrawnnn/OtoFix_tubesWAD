<?php

namespace App\Http\Controllers;


use App\Models\OrderServices as ModelsOrderServices;
use Illuminate\Http\Request;

class OrderServices extends Controller
{
    public function index()
    {
        // $products=Product::orderBy('id', 'desc') ->get();
        $order=ModelsOrderServices::all();
        return view('admin.indexadmin', compact('order'));
        // return 'test';
    }

    public function show($id)
    {
        $order = ModelsOrderServices::find($id);
        return view('admin.indexadmin', compact('order'));
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

        ModelsOrderServices::create([

            'id_order' => $random_id,    
            'services' => $request -> services,    
            'location' => $request -> location,
            'price' => $request -> price,
        ]);

        return redirect('/indexadmin');
    }
}
