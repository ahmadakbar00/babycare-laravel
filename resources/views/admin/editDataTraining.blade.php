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
<form method="POST" action="admin/data-training/update-data-training">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur (Bulan)</label>
                    <select name="age" " type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)" value="{{$dataTraining->age}}">
                        @for($i=1;$i<61;$i++)
                          <option <?php if( $dataTraining->age == $i ) echo "selected"; ?>>{{$i}}</option>
                        @endfor
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang (Cm)</label>
                    <input  name="length" type="number" step="0.01"  class="form-control  @error('length') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi"  required autocomplete="length" value="{{$dataTraining->length}}">
                    @error('length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat (Kg)</label>
                    <input name="weight" type="number" step="0.01"  class="form-control  @error('weight') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Berat Bayi" value="{{$dataTraining->weight}}" required autocomplete="weight" autofocus>
                    @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select name="gender" class="form-control" id="exampleFormControlSelect1" >
                      <option <?php if( $dataTraining->gender == 'Laki-laki' ) echo "selected"; ?>>Laki-laki</option>
                      <option <?php if( $dataTraining->gender == 'Perempuan' ) echo "selected"; ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status Gizi</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1" >
                      <option <?php if( $dataTraining->status == 'Baik' ) echo "selected"; ?>>Baik</option>
                      <option <?php if( $dataTraining->status == 'Kurang' ) echo "selected"; ?>>Kurang</option>
                      <option <?php if( $dataTraining->status == 'Lebih' ) echo "selected"; ?>>Lebih</option>
                    </select>
                  </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <span class="card-footer d-flex">
                  <button type="submit" class="btn btn-primary">Update Data</button>
                  <input name="id" value="{{$dataTraining->id ?? 0}}" hidden>

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
          <form method="POST" action="admin/data-training/delete-data">
          @csrf
            <div class="card-body">
              <div class="form-group">
                <h4>Apakah anda yakin ingin menghapus data training no: "{{$dataTraining->id}}"?</h4>
            <div class="card-footer bg-white d-flex justify-content-center">
              <button type="" href="submit" class="btn px-5 mx-2 btn-danger">Ya</button>
              <a type="" class="btn px-5 mx-2 btn-warning" data-dismiss="modal" aria-label="Close">Tidak</a>
            </div>
            <input name="id" value="{{$dataTraining->id ?? 0}}" hidden>
          </form>
        </div>
        
        </div>
    </div>
    </div>
    </div>
    <!-- end modal -->
</div>

@endsection
