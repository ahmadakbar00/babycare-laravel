@extends('admin.layouts.user-dash-layout')
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
<form method="POST" action="user/add">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Nama Bayi" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur</label>
                    <input name="age" type="number" class="form-control  @error('age') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)" value="{{ old('age') }}" required autocomplete="age" autofocus>
                    @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang</label>
                    <input name="length" type="number" step="0.01"  class="form-control  @error('length') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi" value="{{ old('length') }}" required autocomplete="length" autofocus>
                    @error('length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat</label>
                    <input name="weight"type="number" step="0.01"  class="form-control  @error('weight') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Berat Bayi" value="{{ old('weight') }}" required autocomplete="weight" autofocus>
                    @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select name="gender" class="form-control" id="exampleFormControlSelect1">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                    </select>
                </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

    <!-- <button class="btn btn-primary m-2" data-toggle="modal" data-target="#exampleModal">
        Tambah Bayi
    </button> -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
       
        </div>
        
        </div>
    </div>
    </div> -->

<div class="container">
<div class="row">
           


           

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



      
</div>
@endsection
