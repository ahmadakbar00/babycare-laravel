@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Menu Bayi')
@section('content')
<div class="container">
    <button class="btn btn-primary m-2" data-toggle="modal" data-target="#exampleModal">
        Tambah Data Bulanan
    </button>

    <h4>Baby Detail Page </h4>
    <h6>Nama: {{$data->name}} </h6>
    <h6>Umur: {{$data->age}} </h6>
    <h6>Panjang: {{$data->length}} </h6>
    <h6>Berat: {{$data->weight}} </h6>
    <h6>Gender: {{$data->gender}} </h6>
    <h6>Status: {{$data->status}} </h6>

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
        <form method="POST" action="/baby/{{$data->id}}/add-data">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur</label>
                    <input name="age" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang</label>
                    <input name="length" type="number" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat</label>
                    <input name="weight" type="number" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat Bayi">
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
