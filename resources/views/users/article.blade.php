@extends('users.layouts.user-dash-layout')
@section('title','Dashboard')
@section('content')
<div class="container p-2">

<div class="container">
  
  @foreach ($dataArticle as $article)
  <div class="row">
            <a class="col" href="{{url('user/babyDetail/baby/'.$article->id)}}">
            <div class="card bg-dark">
              <div class="card-header justify-content-between">
                <h3 class="card-title">{{ $article->title }}</h3>
                @if($article->category == "Baik")
                <span style="font-size:10px;" class="badge badge-success mx-2 mt-1 card-title">{{ $article->category }}</span>
                @elseif($article->category == "Kurang")
                <span style="font-size:10px;" class="badge badge-danger mx-2 mt-1 card-title">{{ $article->category }}</span>
                @elseif($article->category == "Lebih")
                <span style="font-size:10px;" class="badge badge-warning mx-2 mt-1 card-title">{{ $article->category }}</span>
                @else
                <span style="font-size:10px;" class="badge badge-primary mx-2 mt-1 card-title">{{ $article->category }}</span>
                @endif
              </div>
              <div class="card-body bg-light d-flex justify-content-center">
              {{ $article->content }}
              </div>
            </div>
</a>


</div>
@endforeach

           

          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 btn">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
            </div>
          </div> -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>



      
</div>
@endsection
