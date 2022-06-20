@extends('users.layouts.user-dash-layout')
@section('title','Menu Bayi')
@section('content')
<script>
  $modal = 0;
  function otherName($inputUser) {
      if($inputUser!=0){
        console.log($inputUser);
        $modal = $inputUser;
        document.getElementById("myLink").innerHTML=$inputUser;
      }else{
        $modal = 0
        console.log('asd'+$inputUser);
    }
  }
  function checkModal() {
    // var input = document.getElementById("userInput").value;
    if($modal==0){
      return $modal
    }else{
    return $modal
    }
  }
</script>
<div class="container p-3">
  
  @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
  @endif
  @if(session()->has('error'))
      <div class="alert alert-error">
          {{ session()->get('error') }}
      </div>
  @endif
  <div class="row">
      <div class="card box-profile col-6 p-5">
        <h3 class="profile-username text-center">Data Bulan Ke- {{$data->age}}</h3>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Nama</b> <a class="float-right">{{$data->name}}</a>
          </li>
          <li class="list-group-item">
            <b>Umur</b> <a class="float-right">{{$data->age}}</a>
          </li>
          <li class="list-group-item">
            <b>Panjang</b> <a class="float-right">{{$data->length}}</a>
          </li>
          <li class="list-group-item">
            <b>Berat</b> <a class="float-right">{{$data->weight}}</a>
          </li>
          <li class="list-group-item">
            <b>Gender</b> <a class="float-right">{{$data->gender}}</a>
          </li>
          @if($data->status == "Baik")
          <li class="list-group-item">
            <b>Status</b> <a class="float-right"><span class="badge badge-primary">{{$data->status}}</span></a>
          </li>
          @elseif($data->status == "Kurang")
          <li class="list-group-item">
            <b>Status</b> <a class="float-right"><span class="badge badge-danger">{{$data->status}}</span></a>
          </li>
          @elseif($data->status=="Lebih")
          <li class="list-group-item">
            <b>Status</b> <a class="float-right"><span class="badge badge-warning">{{$data->status}}</span></a>
          </li>
          @endif()
        </ul>

        <button class="btn btn-success mb-2" data-toggle="modal" data-target="#antropometriModal" onclick="otherName(0);">
            Tambah Data Bulanan
        </button>
        
      </div>

      <div class="col-6">

      <div class="card card-success card-outline">
      <div class="card-header">
                <h3 class="card-title">Pengaturan Akun <span class="font-weight-bold font-italic">{{$data->name}}</span></h3>
              </div>
        <div class="row m-4">
          <div class="col-6">
            <a data-toggle="modal" data-target="#editData"  class="btn btn-warning btn-block"><b>Edit Data Anak</b></a>
          </div>
          <div class="col-6">
          <a data-toggle="modal" data-target="#deleteData" class="btn btn-danger btn-block"><b>Hapus Data Anak</b></a>
          </div>
        </div>
        </div>

        <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Tabel Laporan</h3>
              </div>
              <div class="card-body">
                
                @for($i=1;$i<61;$i++)
                    @if(array_search($i,$data3)||$i==$data->age)
                    <div class="btn btn-success btn-sm m-1 disabled" style="width:40px">
                      {{$i}}
                    </div>
                    @else
                      @if($data->age>$i)
                      <div class="btn btn-outline-secondary btn-sm m-1 disabled" style="width:40px">
                        {{$i}}
                      </div>
                      @else
                      <button class="btn btn-outline-success btn-sm m-1" id="userInput"
                       onclick="otherName({{$i}});" 
                       data-toggle="modal" data-target="#antropometriModal2" style="width:40px">
                        {{$i}}
                      </button>
                      @endif
                    @endif
                @endfor

              </div>
            </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
@if($data->status=="Baik")
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Status Gizi Anak Anda {{$data->status}}</h3>
          </div>
          <div class="card-body">
            <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, iste dolorem ad expedita deserunt voluptatem adipisci cum quibusdam. Provident laudantium itaque veritatis consequatur sint beatae placeat distinctio perferendis excepturi natus.</h5>
          </div>
        </div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Rekomendasi</h3>
          </div>
          <div class="card-body">
            <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, iste dolorem ad expedita deserunt voluptatem adipisci cum quibusdam. Provident laudantium itaque veritatis consequatur sint beatae placeat distinctio perferendis excepturi natus.</h5>
          </div>
        </div>
@elseif($data->status=="Kurang")
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Status Gizi Anak Anda {{$data->status}}</h3>
          </div>
          <div class="card-body">
            <h5>
             Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit ab impedit accusamus ducimus ex laborum molestiae aliquam odit quasi dolore maiores nemo dolorum ipsa quos eligendi, fuga corrupti quae. Laboriosam?
            </h5>
          </div>
        </div>
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Rekomendasi</h3>
          </div>
          <div class="card-body">
            <h5> Pilihan makanan untuk anak dengan gizi kurang ialah makanan yang padat gizi. Frekuensi makan 3 kali sehari dengan selingan 2-3 kali.Usahakan makanan lengkap saji, artinya mengandung karbohidrat, protein, lemak, vitamin dan mineral dalam satu sajian makanan. Berikan beragam makanan, jangan terpaku hanya satu jenis lauk agar anak tidak merasa bosan. Dan Segeralah berkonsultasi dengan dokter untuk memberikan solusi yang terbaik.</h5>
          </div>
        </div>
@elseif($data->status=="Lebih")
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Status Gizi Anak Anda {{$data->status}}</h3>
          </div>
          <div class="card-body">
            <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, iste dolorem ad expedita deserunt voluptatem adipisci cum quibusdam. Provident laudantium itaque veritatis consequatur sint beatae placeat distinctio perferendis excepturi natus.</h5>
          </div>
        </div>
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Rekomendasi</h3>
          </div>
          <div class="card-body">
            <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, iste dolorem ad expedita deserunt voluptatem adipisci cum quibusdam. Provident laudantium itaque veritatis consequatur sint beatae placeat distinctio perferendis excepturi natus.</h5>
          </div>
        </div>
@endif
      </div>


      <div class="col-6">
        <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Perbandingan Data Status Gizi Anak</h3>
              </div>
              <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="donutChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
      </div>
  </div>

    <div class="row">
    <div class="col">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Grafik Perkembangan Berat dan Tinggi Anak</h3>
        </div>
        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 456px;" width="456" height="250" class="chartjs-render-monitor"></canvas>
        </div> 
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Grafik Perkembangan Berat Anak</h3>
        </div>
        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="lineChartWeight" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
        </div> 
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Grafik Perkembangan Panjang/Tinggi Anak</h3>
        </div>
        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="lineChartLength" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
        </div> 
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Grafik Perkembangan Panjang/Tinggi Anak</h3>
        </div>
        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="lineChartLength" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
        </div> 
      </div>
    </div>
    </div>

     
  
    <!-- Modal -->
    <div class="modal fade" id="antropometriModal" tabindex="-1" role="dialog" aria-labelledby="antropometriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="antropometriModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="user/baby/add-report">
        <!-- <form method="POST" action="user/add-report"> -->
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur (Bulan) {{$data->report_monthly}} </label>
                    <select name="age" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)">
                        @for($i=$data->age+1;$i<61;$i++)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang (cm)</label>
                    <input name="length" type="number" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat (kg)</label>
                    <input name="weight" type="number" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat Bayi">
                  </div>
                  </div>
                  <input name="id" value="{{$data->baby_id ?? 0}}" hidden>
                  <input name="name" value="{{$data->name ?? 0}}" hidden>
                  <input name="gender" value="{{$data->gender ?? 0}}" hidden>
                  <input name="baby_id" value="{{$data->baby_id ?? 0}}" hidden>
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
    
    <!-- Modal -->
    <div class="modal fade" id="antropometriModal2" tabindex="-1" role="dialog" aria-labelledby="antropometriModal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="antropometriModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="user/baby/add-report">
        <!-- <form method="POST" action="user/add-report"> -->
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur (Bulan)</label>
                    <select name="age" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Umur Bayi (Bulan)"
                    @for($i= $data->age; $i<61;$i++)
                      <option <?php if( $data->age == $i ) echo "selected"; ?>>{{$i}}</option>
                    @endfor
                    >
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang (cm)</label>
                    <input name="length" type="number" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="Masukan Panjang Bayi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat (kg)</label>
                    <input name="weight" type="number" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat Bayi">
                  </div>
                  </div>
                  <input name="id" value="{{$data->id ?? 0}}" hidden>
                  <input name="name" value="{{$data->name ?? 0}}" hidden>
                  <input name="gender" value="{{$data->gender ?? 0}}" hidden>
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
    <!-- end modal -->

    <!-- Modal Edit --> 
    <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="antropometriModal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="antropometriModalLabel">Edit Data Anak</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="user/baby/edit-baby">
        <!-- <form method="POST" action="user/add-report"> -->
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="name" type="text" value="{{$data->name}}" class="form-control" required id="exampleInputEmail1" placeholder="Masukan Panjang Bayi">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <input name="id" value="{{$data->baby_id ?? 0}}" hidden>
              </form>
        </div>
        
        </div>
    </div>
    </div>
  </div>
  <!-- end modal -->

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
        <form method="POST" action="user/baby/delete-baby">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                   <h4>Apakah anda yakin ingin menghapus data anak anda "{{$data->name}}"?</h4>
                <div class="card-footer bg-white d-flex justify-content-center">
                  <button type="submit" class="btn px-5 mx-2 btn-danger">Ya</button>
                  <button type="" class="btn px-5 mx-2 btn-warning" data-dismiss="modal" aria-label="Close">Tidak</button>
                </div>
                <input name="id" value="{{$data->id ?? 0}}" hidden>
              </form>
        </div>
        
        </div>
    </div>
    </div>
    </div>
    <!-- end modal -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>


<script>
  console.log({{$data2['kurang']}});
  $(function () {

    //-------------
    //- line CHART -
    //-------------
    var lineChartWeightCanvas = document.getElementById("lineChartWeight").getContext("2d")
    var lineDataWeight        = {
      labels: [
          @for($i=0;$i<count($data3);$i++)
            'Bulan-{{$data3[$i]}}',
          @endfor
      ],
      datasets: [
        {
          // data: [{{$data2['kurang']}},{{$data2['lebih']}},{{$data2['baik']}}],
          label               : 'Berat Badan',
          backgroundColor     : '#5cb85c',
          borderColor         : '#5cb85c',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [
            @for($i=0;$i<count($dataWeight);$i++)
            {{$dataWeight[$i]}},
            @endfor
          ],
        }
      ]
    }
    var lineOptionsWeight     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    new Chart(lineChartWeightCanvas, {
      type: 'line',
      data: lineDataWeight,
      options: lineOptionsWeight
    })

    //-------------
    //- line CHART LENGTH -
    //-------------
    var lineChartCanvas = document.getElementById("lineChartLength").getContext("2d")
    var lineData        = {
      labels: [
          @for($i=0;$i<count($data3);$i++)
            'Bulan-{{$data3[$i]}}',
          @endfor
      ],
      datasets: [
        {
          // data: [{{$data2['kurang']}},{{$data2['lebih']}},{{$data2['baik']}}],
          label               : 'Panjang/Tinggi Badan',
          backgroundColor     : '#5cb85c',
          borderColor         : '#5cb85c',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [
            @for($i=0;$i<count($dataLength);$i++)
            {{$dataLength[$i]}},
            @endfor
          ],
        }
      ]
    }
    var lineOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(lineChartCanvas, {
      type: 'line',
      data: lineData,
      options: lineOptions
    })


    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = document.getElementById("donutChart").getContext("2d")
    var donutData        = {
      labels: [
          // 'Kurang: {{$data2['kurang']}}',
          'Baik',
          'Kurang',
          'Lebih',
      ],
      datasets: [
        {
          data: [{{$data2['baik']}},{{$data2['kurang']}},{{$data2['lebih']}}],
          backgroundColor : ['#3c8dbc','#f56954', '#f5e238'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

         //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = document.getElementById("barChart").getContext("2d")
    // var barChartData = $.extend(true, {}, areaChartData)
    // var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    // barChartData.datasets[0] = temp1
    // barChartData.datasets[1] = temp0
  
   var barChartData= {
        labels  : [
          @for($i=0;$i<count($data3);$i++)
            'Bulan-{{$data3[$i]}}',
          @endfor
        ],
        datasets: [
        {
          // data: [{{$data2['kurang']}},{{$data2['lebih']}},{{$data2['baik']}}],
          label               : 'Berat Badan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [
            @for($i=0;$i<count($dataWeight);$i++)
            {{$dataWeight[$i]}},
            @endfor
          ],
        },
        {
          // data: [{{$data2['kurang']}},{{$data2['lebih']}},{{$data2['baik']}}],
          label               : 'Tinggi Badan',
          backgroundColor     : 'rgba(60,101,118,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [
            @for($i=0;$i<count($dataLength);$i++)
            {{$dataLength[$i]}},
            @endfor
          ],
        }
      ],
   }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })
</script>
@endsection
