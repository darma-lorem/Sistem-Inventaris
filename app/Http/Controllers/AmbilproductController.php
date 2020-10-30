<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbilProduct as model;
use App\Product;
use App\Exports\AmbilExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class AmbilproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambils = model::with('getNameProduct','getCreatedBy','getUpdatedBy')->orderBy('id','desc')->get();
        return view('transaksi.table',compact('ambils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_product = product::pluck('name','id');

        return view('transaksi.form',compact('id_product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        model::create($request->all());
        $this->updateProduct($request);
        return redirect('transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editForm = true;
        $ambils = model::with('getNameProduct')->find($id);
        $id_product = Product::pluck('name','id');

        return view('transaksi.form',compact('ambils','editForm','id_product'));
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
        $this->updateProduct($request, $id);
        $data = $request->except('_method', '_token');
        model::where('id',$id)->update($data);      
        return redirect('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $value = model::where('id',$id);
        $product = Product::where('id',$value->value('id_product'));

        if( $value->first()->jenis_transaksi_product == 'Masuk' ){
            $product->update(["jumlah_product"=>(int) $Product->value('jumlah_product') - (int) $value->first()->jumlah_product]);
        }elseif( $value->first()->jenis_transaksi_product == 'Keluar' ){
            $product->update(["jumlah_product"=>(int) $Product->value('jumlah_product') + (int) $value->first()->jumlah_product]);
        }
        model::destroy($id);

        return redirect('transaksi');
    }

    public function updateProduct($request, $idTrx=''){
        $product = Product::where('id',$request->id_product);
        $value = $product->value('jumlah_product');

        if( $idTrx != '' ){
            $trx = model::where('id',$idTrx)->first();            
            if( $trx->jenis_transaksi_product == 'Masuk' ){
                $product->update(["jumlah_product"=>(int) $value - (int) $trx->jumlah_product]);
            }elseif( $trx->jenis_transaksi_product == 'Keluar' ){
                $product->update(["jumlah_product"=>(int) $value + (int) $trx->jumlah_product]);
            }
            $value = Product::where('id',$request->id_product)->value('jumlah_product');
        }

        if( $request->jenis_transaksi_product == 'Masuk' ){
            $product->update(["jumlah_product"=>(int) $value + (int) $request->jumlah_product]);
        }elseif( $request->jenis_transaksi_product == 'Keluar' ){
            $product->update(["jumlah_product"=>(int) $value - (int) $request->jumlah_product]);
        }
    }

    public function export(){
        return Excel::download(new AmbilExport, 'Inventaris.xlsx');
    }
}
