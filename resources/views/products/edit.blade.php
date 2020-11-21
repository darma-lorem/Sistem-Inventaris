@extends('layouts.user')


@section('main-content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Kembali</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.update',$products->id) }}" method="POST">
    	@csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    <input type="text" name="name" value="{{ $products->name }}" class="form-control"    >
                </div>
            <div class="form-group">
                    <strong>Kode Barang:</strong>
                    <input type="text" name="kode_product" value="{{ $products->kode_product }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori:</strong>
                    <select name="id_kategori" class="form-control">
                        <option value=""><--Pilih Kategori--></option>
                        @foreach ($kategori as $kate)
                        <option value="{{ $kate->id }}">{{ $kate->kode_kategori}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Satuan:</strong>
                    <select name="id_satuan" class="form-control">
                        <option value=""><--Pilih Satuan--></option>
                        @foreach ($satuan as $satu)
                        <option value="{{$satu->id}}">{{$satu->kode_satuan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Barang:</strong>
                    <input type="number" name="jumlah_product" value="{{ $products->jumlah_product }}" class="form-control" placeholder="Jumlah Barang">
                </div>
            </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection