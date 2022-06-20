@extends('users.layouts.user-dash-layout')
@section('title','Dashboard')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/0.2.0/Chart.min.js" type="text/javascript"></script>
<div class="container p-5">

  <div class="row">
  <div class="col">
    <!--  list -->
    <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Reports</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Anak</th>
                      <th>Status</th>
                      <th>Tanggal Monitoring</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($dataListReport as $d)
                      <tr>
                        <td><span >{{ $loop->iteration }}</span></td>
                        <td>{{$d->name}}</td>
                        <td>
                          @if($d->status == "Baik")
                          <span class="badge badge-success">{{$d->status}}</span>
                          @elseif($d->status == "Kurang")
                          <span class="badge badge-danger">{{$d->status}}</span>
                          @elseif($d->status == "Lebih")
                          <span class="badge badge-warning">{{$d->status}}</span>
                          @endif
                        </td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{$d->updated_at}}</div>
                        </td>
                      </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="user/babyDetail" class="btn btn-sm btn-info float-left">Tambah Laporan</a>
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Lihat Semua</a> -->
              </div>
              <!-- /.card-footer -->
            </div>
    <!--  /list -->
  </div>
  
   
</div>
   
@endsection
