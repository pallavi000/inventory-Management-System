<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use Rap2hpoutre\FastExcel\FastExcel;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'quantity'=>'required',
            'uom'=>'required',
            'status'=>'required',
        ]);

        $product= Product::create([
            'name'=>$request->name,
            'quantity'=>$request->quantity,
            'status'=>$request->status,
            'description'=>$request->description,
            'uom'=>$request->uom,
        ]);
        if($product){
            return redirect()->back()->with(['success' => 'Product created successfully!!']);
        }else{
            return redirect()->back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'quantity'=>'required',
            'uom'=>'required',
            'status'=>'required',
        ]);

       
            $product->name=$request->name;
            $product->quantity=$request->quantity;
            $product->status=$request->status;
            $product->description=$request->description;
            $product->uom=$request->uom;
            $product->save();
        
            return redirect()->back()->with(['success' => 'Product updated successfully!!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product){
            $product->delete();
             return redirect()->back()->with(['success' => 'Product deleted successfully!!']);

        }
    }

    public function excelImport(Request $request){
        $products = (new FastExcel)->import(request()->file('file'), function ($line) {
           
            $product = Product::create([
                'name' => $line['Description'],
                'description' => $line['Description'],
                'status' => $line['Item Status'],
                'uom' => !$line['UOM']?' ':$line['UOM'],
                'quantity' => !$line['MAX Qty Required']?0: $line['MAX Qty Required'],
                'item_id'=>$line['Item']
                
            ]);
            return $product;


        });
        return redirect()->back()->with(['success' => 'Product Created successfully!!']);

    }

    public function excel(){
        return view('admin.product.excel');
        
    }
}
