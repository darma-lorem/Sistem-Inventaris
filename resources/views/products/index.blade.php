@extends('layouts.user')


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Operasional Barang</h6>
                </div>
                <div class="card-body">
                
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
                <th>Satuan</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Masuk</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @foreach ($products as $product)
        <tbody>
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->kategori }}</td>
                <td>{{ $product->satuan }}</td>
                <td>{{ $product->jumlah_product }}</td>
                <td>{{ $product->tanggal_masuk }}</td>
                <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
    </div>
        </div>
    </div>
@endsection