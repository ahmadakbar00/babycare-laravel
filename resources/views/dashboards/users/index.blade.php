@extends('dashboards.users.layouts.user-dash-layout')
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
        <form method="POST" action="add">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur</label>
                    <input name="age" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang</label>
                    <input name="length" type="number" step="0.01"  class="form-control" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat</label>
                    <input name="weight"type="number" step="0.01"  class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat Bayi">
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
        </div>
        
        </div>
    </div>
    </div>

<div class="container">
<div class="row">
           
@foreach ($data as $baby)
    <!-- <tr>
     <td>{{ $baby->name }}</td>
    </tr> -->

    <div class="col-12 col-sm-6 col-md-3">
            <!-- <a class="info-box btn" href="'.url('/baby/'.$baby->id).'" > -->
            <a class="info-box btn" href="{{url('/baby/'.$baby->id)}}" >
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
                  <span class="info-box-number">
                  {{ $baby->name }}
                  </span>
                <span class="info-box-text">{{ $baby->status }}</span>
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



      
</div>
@endsection
