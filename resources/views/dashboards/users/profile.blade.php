@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Profile')
@section('content')
  <div class="container">
    <table border = "1">
      <tr>
        <td>Nama</td>
        <td>{{$data->name}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>{{$data->email}}</td>
      </tr>
  
    </table>
  </div>
@endsection


