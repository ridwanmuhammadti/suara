@extends('backend.master')
@section('judul')
    Users
@endsection

@section('content')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
        
          </div>
        <div class="card-body p-0">
          
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <tbody><tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
              </tr>
              @foreach ($user as $item)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>
                          @if ($item->role == '1')
                              <span class="badge badge-info">Admin</span>
                          @else <span class="badge badge-success">Author</span>
                          @endif
                      </td>
                      <td>
                        <a href="/user/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/user/{{$item->id}}/delete" class="btn btn-danger btn-sm">Hapus</a>
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
@endsection
