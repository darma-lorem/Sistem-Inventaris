<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Product as model;
use App\Kategori;
use App\Satuan;

class ProductController extends Controller
{


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = model::with('getKodeKategori', 'getKodeSatuan', 'getUpdatedBy')->orderBy('id','desc')->get();
        // dd($products->toJSON());
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('products.create', compact('kategori'))->with('satuan', $satuan);
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
            'kode_product' => 'required',
            'id_kategori' => 'required',
            'id_satuan' => 'required',
            'jumlah_product' => 'required',
        ]);
        model::create([
           'name' => $request->name,
           'kode_product' => $request->kode_product,
           'id_kategori' => $request->id_kategori,
           'id_satuan' => $request->id_satuan,
           'jumlah_product' => $request->jumlah_product,
        ]);
        return redirect()->route('products.index')->with('success','Product created successfully.');    
    }

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
        $products=model::find($id);
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('products.edit',compact('products', 'kategori', 'satuan'));
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
            'kode_product' => 'required',
            'id_kategori' => 'required',
            'id_satuan' => 'required',
            'jumlah_product' => 'required',      
        ]);
        model::where('id', $id)->update([
           'name' => $request->name,
           'kode_product' => $request->kode_product,
           'id_kategori' => $request->id_kategori,
           'id_satuan' => $request->id_satuan,
           'jumlah_product' => $request->jumlah_product,
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
        model::find($id)->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }

    public function export(){
        return Excel::download(new ProductExport, 'Barang.xlsx');
    }
}
