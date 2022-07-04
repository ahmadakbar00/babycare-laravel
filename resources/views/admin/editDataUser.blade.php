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
<form method="POST" action="admin/data-user/update-data-user">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input  name="name" type="text" class="form-control  @error('length') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Nama User"  required autocomplete="name" value="{{$dataUser->name}}" autofocus>
                    @error('length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="text"  class="form-control  @error('weight') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan email " value="{{$dataUser->email}}" required autocomplete="email" >
                    @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select name="role" class="form-control" id="exampleFormControlSelect1" >
                      <option <?php if( $dataUser->role == 1 ) echo "selected"; ?>>Admin</option>
                      <option <?php if( $dataUser->role == 2 ) echo "selected"; ?>>User</option>
                    </select>
                  </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <span class="card-footer d-flex">
                  <button type="submit" class="btn btn-primary">Update Data</button>
                  <input name="id" value="{{$dataUser->id ?? 0}}" hidden>

                  <a data-toggle="modal" data-target="#deleteData" type="submit" class="btn btn-danger ml-auto">Hapus Data</a>
                </span>
    </form>

  <div class="container">
<div class="row">
           
<div class="clearfix hidden-md-up"></div>
</div>
     
<!-- Modal Delete -->
<div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="deleteModal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Hapus Data Anak</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="admin/data-user/delete-data">
          @csrf
            <div class="card-body">
              <div class="form-group">
                <h4>Apakah anda yakin ingin menghapus user  "{{$dataUser->name}}"?</h4>
            <div class="card-footer bg-white d-flex justify-content-center">
              <button type="" href="submit" class="btn px-5 mx-2 btn-danger">Ya</button>
              <a type="" class="btn px-5 mx-2 btn-warning" data-dismiss="modal" aria-label="Close">Tidak</a>
            </div>
            <input name="id" value="{{$dataUser->id ?? 0}}" hidden>
          </form>
        </div>
        
        </div>
    </div>
    </div>
    </div>
    <!-- end modal -->
</div>

@endsection
