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

                    <div class="table-responsive">
                        <a class="btn btn-primary" href="{{ url('transaksi/create') }}">
                            Tambah Data
                        </a>
                        <a class="btn btn-success" href="{{ url('transaksi/export') }}">
                            Export to Excel
                        </a>
                        <p></p>
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Kode Transaksi</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Kode Barang</th>
                                    <th class="text-center">Jenis Transaksi</th>
                                    <th class="text-center">Jumlah Barang</th>
                                    <th class="text-center">Detail Penggunaan Barang</th>
                                    <th class="text-center">Tanggal Pengambilan</th>
                                    <th class="text-center">&nbsp;action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ambils as $ambil)
                                    <tr>
                                        <td>{{ $ambil->getCode() }}</td>
                                        <td>{{ $ambil->getNameProduct->name }}</td>
                                        <td>{{ $ambil->getNameProduct->kode_product }}</td>
                                        <td>{{ $ambil->jenis_transaksi_product }}</td>
                                        <td>{{ $ambil->jumlah_product }}</td>
                                        <td>{{ $ambil->detail_penggunaan_product}}</td>
                                        <td>{{ $ambil->tanggal_pengambilan}}</td>
                                        <td>
                                            <a href="{{ URL::route('transaksi.edit',$ambil->id) }}"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('transaksi/destroy/'.$ambil->id) }}"><i class="fa fa-trash red-color"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
