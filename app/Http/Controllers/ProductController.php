<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Product;

class ProductController extends Controller
{


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'jumlah_product' => 'required',
            'tanggal_masuk' => 'required'
        ]);
        Product::create([
           'name' => $request->name,
           'kategori' => $request->kategori,
           'satuan' => $request->satuan,
           'jumlah_product' => $request->jumlah_product,
           'tanggal_masuk' => $request->tanggal_masuk
        ]);
        return redirect()->route('products.index')->with('success','Product created successfully.');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required'
        ]);
        Product::update([
           'name' => $request->name,
           'kategori' => $request->kategori,
           'satuan' => $request->satuan,
           'jumlah' => $request->jumlah_product,
           'tanggal_masuk' => $request->tanggal_masuk
        ]);
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }

    public function export(){
        return Excel::download(new ProductExport, 'Barang.xlsx');
    }
}
