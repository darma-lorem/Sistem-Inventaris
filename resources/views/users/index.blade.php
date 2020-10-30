@extends('layouts.admin')


@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right py-2">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Users</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                       <tr>
                         <th>No</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Jabatan</th>
                         <th>Roles</th>
                         <th width="280px">Action</th>
                       </tr>
                       @foreach ($data as $key => $user)
                        <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->jabatan }}</td>
                          <td>
                            @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $v)
                                 <label class="badge badge-success">{{ $v }}</label>
                              @endforeach
                            @endif
                          </td>
                          <td>
                              <a class="fa fa-edit" href="{{ route('users.edit',$user->id) }}">Edit</a>
                              {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                  {!! Form::submit('Delete', ['class' => 'fa fa-trash red-colorbtn btn-danger']) !!}
                              {!! Form::close() !!}
                          </td>
                        </tr>
                       @endforeach
                      </table>

                </div>
            </div>


{!! $data->render() !!}

@endsection