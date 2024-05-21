<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Order;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if( $request->has("search") ){
            $data = Product::where("name","LIKE","%". $request->search ."%")->paginate(5);
      
        }else{
            $data = Product::paginate(5);
        }
        return view('admin.product',[
            'title' =>'Manage Product',
            'category'=>Category::all()
        ],compact('data'));
    }
    public function storeproduct(Request $request)
    {
        $data = Product::create($request->all());
        if ($request->hasFile("image_path")) {
            $request->file("image_path")->move('img/product',$request->file('image_path')->getClientOriginalName());
            $data->image_path = $request->file('image_path')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route("admin.product")->with('addproduct','Product Has Been Added');
    }

    public function deleteproduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("admin.product")->with('deleteproduct','Product Has Been Deleted');
        
    }   
    
    public function editproduct($id)
    {
        $product = Product::find($id);
        return view('admin.editproduct',[
            'title'=>'Edit Product',
            'data'=>$product,
            'category'=>Category::all()
        ]);
    }
    public function updateproduct(Request $request, $id)
    {
        $data = Product::find($id);
        $data->update($request->all());
        if ($request->hasFile("image_path")) {
            $request->file("image_path")->move('img/product',$request->file('image_path')->getClientOriginalName());
            $data->image_path = $request->file('image_path')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('admin.product')->with('updateproduct','Product ' .$data->name . ' Has Been Updated');
    }

public function filterproduct(Request $request)
{
    $ct = $request->filterproduct;
    $sc = $request->search;
    $limit = $request->input('limit',5);
    // $data = Product::where('category_id',$ct)->paginate(5);
    $data = Product::when($ct, function ($query) use ($ct) {
        return $query->where('category_id', $ct);
    })->when($sc, function ($query) use ($sc) {
        return $query->where('name', 'like', '%' . $sc . '%');
    })->paginate($limit);

    // dd($data);
    return view('admin.product',[
        'title' =>'Manage Product',
        'data'=>$data,
        'category'=>Category::all()
    ]);
    // $data = Product::when($ct,function($query) use ($ct){
    //     return $query->where('category_id',$ct);
    // })->get();
    // dd($data);
    // return view('admin.order',[
    //     'data'=>$data
    // ]
    // );
}
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
