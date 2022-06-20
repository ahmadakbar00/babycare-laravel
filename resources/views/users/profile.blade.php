@extends('users.layouts.user-dash-layout')
@section('title','Profile')
@section('content')
  <div class="container p-5 d-flex justify-content-center">

  <div class="card card-success card-outline" style="width:700px;">
      <div class="card-header">
        <h3 class="card-title">Akun Anda</h3>
      </div>
      <br/>
      <div class="card-body text-center ">
          <table class="table tabl-md" >
          <tr>
            <td class="font-weight-bold">Nama</td>
            <td>{{$data->name}}</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Email</td>
            <td>{{$data->email}}</td>
          </tr>
        </table>  
       </div>
      </div>


  </div>
@endsection


