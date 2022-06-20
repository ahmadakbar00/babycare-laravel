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
  <div data-toggle="modal" data-target="#articleModal" class="btn btn-primary">Tambahkan Artikel</div>
    <div class="row text-center p-2">
      <div class="col">
      <table class="table text-center" style="table-layout: fixed;">
        <thead>
          <tr>
            <th scope="col" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">No</th>
            <th scope="col" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Judul</th>
            <th scope="col" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"">Konten</th>
            <th scope="col" style="width: 11% white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Kategori</th>
            <th scope="col" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Tanggal Diinput</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataArticle as $dataArticle)
          <tr>
            <th scope="row" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">{{ $loop->iteration }}</th>
            <td>{{$dataArticle->title}}</td>
            <td class="text-justify text-nowrap" style="white-space: nowrap; text-overflow: ellipsis;overflow: hidden;">{{$dataArticle->content}}</td>
            <td>{{$dataArticle->category}}</td>
            <td>{{$dataArticle->updated_at}}</td>
            <td class="text-center"> 
              <a href="{{url('admin/article/edit-data-article/'.$dataArticle->id)}}" class="btn btn-warning">Edit</a>
             </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade"  id="articleModal" tabindex="-1" role="dialog" aria-labelledby="articleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="articleModalLabel">Tambah Artikel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="admin/addArticle">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input name="title" type="text" step="" class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Isi Artikel</label>
                    <textarea name="content" type="text" step="" class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat Bayi"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Artikel</label>
                    <select name="status" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)">
                          <option value="Baik">Baik</option>
                          <option value="Kurang">Kurang</option>
                          <option value="Lebih">Lebih</option>
                          <option value="Umum">Umum</option>
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
@endsection
