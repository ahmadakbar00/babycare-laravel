@extends('users.layouts.user-dash-layout')
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
                    <label for="exampleInputEmail1">Umur (Bulan)</label>
                    <select name="age" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)">
                        @for($i=1;$i<61;$i++)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang (Cm)</label>
                    <input name="length" type="number" step="0.01"  class="form-control  @error('length') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi" value="{{ old('length') }}" required autocomplete="length" autofocus>
                    @error('length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat (Kg)</label>
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

<div class="container">
<div class="row">
           
<div class="clearfix hidden-md-up"></div>
</div>
     
</div>
@endsection
