@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')
@section('content')
<div class="container p-2">
    <button class="btn btn-primary m-2" data-toggle="modal" data-target="#exampleModal">
        Tambah Bayi
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{route('admin.addBaby')}}">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur</label>
                    <input name="age" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang</label>
                    <input name="length" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat</label>
                    <input name="weight" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat Bayi">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kelamin</label>
                      <select name="gender" class="form-control" id="exampleFormControlSelect1">
                          <option>Laki-laki</option>
                          <option>Perempuan</option>
                        </select>
                    </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Status Gizi</label>
                      <select name="status" class="form-control" id="exampleFormControlSelect1">
                          <option>Kurang</option>
                          <option>Baik</option>
                          <option>Lebih</option>
                        </select>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
        
        </div>
    </div>
    </div>
</div>
@endsection
