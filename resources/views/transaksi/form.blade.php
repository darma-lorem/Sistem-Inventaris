@extends('layouts.user')

@section('main-content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Inventaris Barang</h6>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($editForm))
                        {!! Form::model('', ['url' => url('/transaksi/'.$ambils->id), 'method' => 'put']) !!}
                        {{ Form::hidden('updated_by', Auth::user()->id, ['class' => 'form-control']) }}
                    @else
                        {!! Form::model('', ['url' => url('/transaksi'), 'method' => 'post']) !!}
                        {{ Form::hidden('created_by', Auth::user()->id, ['class' => 'form-control']) }}
                    @endif
                        {{ csrf_field() }}
                        
                        <div class="form-group col-xs-12 col-lg-12">
                            <label class="control-label">Nama Barang</label>
                            {{ Form::select('id_product', $id_product, isset($ambils->id_product) ? $ambils->id_product : null, ['class' => 'form-control', 'placeholder'=>'Pilih']) }}
                        </div>
                        <div class="form-group col-xs-12 col-lg-12">
                            <label class="control-label">Jenis Transaksi</label>
                            {{ Form::select('jenis_transaksi_product', ['Masuk'=>'Masuk','Keluar'=>'Keluar'], isset($ambils->jenis_transaksi) ? $ambils->jenis_transaksi : null, ['class' => 'form-control', 'placeholder'=>'Pilih']) }}
                        </div>
                        <div class="form-group col-xs-12 col-lg-12">
                            <label class="control-label">Jumlah Transaksi</label>
                            {{ Form::number('jumlah_product', isset($ambils->jumlah_product) ? $ambils->jumlah_product : null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-xs-12 col-lg-12">
                            <label class="control-label">Tanggal Pengambilan</label>
                            {{ Form::date('tanggal_pengambilan', isset($ambils->tanggal_pengambilan) ? $ambils->tanggal_pengambilan : null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-xs-12 col-lg-12">
                            <label class="control-label">Detail Pengambilan</label>
                            {{ Form::text('detail_penggunaan_product', isset($ambils->detail_penggunaan_product) ? $ambils->detail_penggunaan_product : null, ['class' => 'form-control']) }}
                        </div>                  
                        <div class="form-group col-xs-12 col-lg-12">
                            <button type="submit" class="btn btn-success">
                                Simpan
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
