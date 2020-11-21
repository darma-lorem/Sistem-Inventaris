@extends('layouts.admin')

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

                    <div class="table-responsive">
                        <a class="btn btn-primary" href="{{ url('kategori/create') }}">
                            Tambah Data
                        </a>
                        <p></p>
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Kategori</th>
                                    <th class="text-center">Kode Kategori</th>
                                    <th class="text-center">&nbsp;action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $kate)
                                    <tr>
                                        <td>{{ $kate->name }}</td>
                                        <td>{{ $kate->kode_kategori }}</td>
                                        <td>
                                            <a href="{{ URL::route('kategori.edit',$kate->id) }}"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('kategori/destroy/'.$kate->id) }}"><i class="fa fa-trash red-color"></i></a>
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
