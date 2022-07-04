@extends('admin.layouts.admin-dash-layout')
@section('title','Dashboard')
@section('content')
<div class="container p-2">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
    <div class="row p-2">
      <div class="col">
      <table class="table table-striped">
  <thead>
    <tr class="text-center" >
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Tanggal Diinput</th>
      <th scope="col" colspan="2"><div class="">Action</div></th>
    </tr>
  </thead>
  <tbody class="text-center" >
    @foreach ($data as $data)
    
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      @if($data->role == 1)
      <td>Admin</td>
      @else
      <td>User</td>
      @endif
      <td>{{$data->updated_at}}</td>
      @if($data->role != 1)
      <td>   
        <a href="{{url('admin/users/edit-data-user/'.$data->id)}}" class="btn btn-warning">Edit</a> 
        <!-- <a href="" class="btn btn-danger">Hapus</a> -->
      </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
      </div>
    </div>
</div>
@endsection
