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

  <div data-toggle="modal" data-target="#dataTestingModal" class="btn btn-primary">Add Data Training</div>
    <div class="row text-center p-2">
      <div class="col">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Umur</th>
            <th scope="col">Panjang</th>
            <th scope="col">Berat</th>
            <th scope="col">Gender</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal Diinput</th>
            <th scope="col" colspan="2"><div class="">Action</div></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataTesting as $data)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$data->age}}</td>
            <td>{{$data->length}}</td>
            <td>{{$data->weight}}</td>
            <td>{{$data->gender}}</td>
            <td>{{$data->status}}</td>
            <td>{{$data->updated_at}}</td>
            <td> 
              <a href="{{url('admin/data-training/edit-data-training/'.$data->id)}}" class="btn btn-warning">Edit</a>
              <!-- <a data-toggle="modal" data-target="#deleteData" class="btn btn-danger">Edit</a>  -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="dataTestingModal" tabindex="-1" role="dialog" aria-labelledby="dataTestingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="dataTestingModalLabel">Tambah Data Training</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="admin/data-training/add-data-training">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur (Bulan)</label>
                    <select name="age" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)">
                        @for($i=1;$i<61;$i++)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur (bulan)</label>
                    <input name="length" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang (cm)</label>
                    <input name="length" type="number" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat (kg)</label>
                    <input name="weight" type="number" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <select name="gender" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)">
                          <option value="Baik">Laki-Laki</option>
                          <option value="Kurang">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status Gizi</label>
                    <select name="status" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)">
                          <option value="Baik">Baik</option>
                          <option value="Kurang">Kurang</option>
                          <option value="Lebih">Lebih</option>
                    </select>
                  </div>
                  </div>
                  <!-- <input name="id" value="{{$data->baby_id ?? 0}}" hidden> -->
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

    
@endsection
