@extends('layouts.user')

@section('main-content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Barang</h6>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{ csrf_field() }}
                        
                        <div class="form-group col-xs-12 col-lg-12">
                            <label class="control-label">Nama Kategori</label>
                            {{ Form::text('name', isset($kategori->name) ? $kategori->name : null, ['class' => 'form-control', 'placeholder'=>'Nama Kategori']) }}
                        </div>
                        <div class="form-group col-xs-12 col-lg-12">
                            <label class="control-label">Kode Satuan</label>
                            {{ Form::text('kode_kategori', isset($kategori->kode_satuan) ? $kategori->kode_kategori : null, ['class' => 'form-control', 'placeholder'=>'Kode Kategori']) }}
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
