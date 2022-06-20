@extends('users.layouts.user-dash-layout')
@section('title','Dashboard')
@section('content')
<div class="container p-2">

<div class="container">
<div class="row">
           
@foreach ($data as $baby)

            <a class="col-12 col-sm-6 col-md-3" href="{{url('user/babyDetail/baby/'.$baby->id)}}">
            <div class="card bg-primary">
              <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">{{ $baby->name }}</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body bg-light d-flex justify-content-center">
              {{ $baby->status }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</a>


@endforeach

          <div class="clearfix hidden-md-up"></div>
</div>



      
</div>
@endsection
