@extends('layout.app')

@section('title', 'Master Data Surat')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
      <!-- Small boxes (Stat box) -->
      <div class="card">
      <div class="card-header">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card-tools">
          <a href="{{ url('master/surat/create')}}" class="btn btn-primary">Tambah Master Surat</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="">Tanggal Awal</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
              </div>
              <input type="text" class="form-control date-picker" value="{{date('1/m/Y')}}" id="datestart"
                placeholder="Tanggal Mulai" data-date-format="dd/mm/yyyy">
            </div>
          </div>
          <div class="col-md-3">
            <label for="">Tanggal Akhir</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-week"></i></div>
              </div>
              <input type="text" class="form-control date-picker" value="{{date('t/m/Y')}}" id="dateend"
                placeholder="Tanggal Mulai" data-date-format="dd/mm/yyyy">
            </div>
          </div>
          <div class="col-md-3" style="margin-top: 31px; margin-left: 0px;">
            <button class="btn btn-primary" type="button" id="cari-data">
              <i class="fas fa-search"></i> Cari
            </button>
            <button class="btn btn-secondary" type="button" id="reset-data">
              <i class="fa fa-recycle"></i> Reset
            </button>
          </div>
        </div>
  
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nama File</th>
                    <th>Tanggal Input</th>
                    <th>Doc Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    </div>
  </div>
  </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection

@section('script')
    <script>
      function hapus(param){
        $.confirm({
            title: 'Perhatian',
            content: 'Apakah Anda Yakin akan menghapus data ini?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Hapus: function () {
                  $.ajax({
                    url: `{{url('master/surat/delete/${param}')}}`, //route
                    type: 'POST',
                    data: {
                      "_token": "{{ csrf_token() }}",
                    },
                    success: function (res) {
                        // toastr.info(res.message);
                        $.alert(res.message);
                        $("#example1").DataTable().ajax.reload();
                    }
                  });
                },
                Batalkan: function () {
                    $.alert('Dibatalkan');
                },
            }
        });
      }

      $("#cari-data").click(function () {
        var from_date = $("#datestart").val();
        var to_date = $('#dateend').val();

        if (from_date != '' && to_date != '') {
          $("#example1").DataTable().destroy();
          load_data(from_date, to_date);
        } else {
          // toastr.warning("Data tanggal kosong")
        }
	    });


      function load_data(from = '', to = ''){
        $('#example1').dataTable({
              processing: true,
              serverside: true,
              responsive: true,
              bDestroy: true,
              ajax: {
                url: "{{url('api/master/list')}}",
                method: "GET",
                data: {
                  from_date: from,
                  to_date: to,
                },
                dataType: "JSON"
              },
              columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'file', name: 'file'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'doc_status', name: 'doc_status'},
                {data: 'aksi', name: 'aksi', width: '18%'}
              ],
              columnDefs: [{
              targets: [4],
              data: 'doc_status',
              render: function (data, type, row, meta) {
                  if (data == 'Submitted') {
                    var label = 'badge badge-info';
                  } else if (data == 'Draft') {
                    var label = 'badge badge-warning';
                  } else if (data == 'Rejected') {
                    var label =  'badge badge-danger';
                  } else if (data == 'In Progress') {
                    var label = 'badge badge-warning';
                  } else {
                    var label = 'badge badge-success';
                  }
                  return '<h6 class="' + label + ' font-weight-bold">' + data + '</h6>';
                }
              }],
              order: [
                [0, 'asc']
              ]
            });
      }

        $(document).ready(function(){
            var from = $('#datestart').val();
            var to = $('#dateend').val();
            // load_data(from, to);
            $("#cari-data").trigger("click");
            $('.date-picker').datepicker({
              autoclose: true,
              format: "dd/mm/yyyy",
              immediateUpdates: true,
              todayBtn: true,
              todayHighlight: true
	          });

        })
    </script>
    @include('component.approval-modal', ['document' => 'Surat Masuk', 'url' => 'surat', 'table' => 'example1', 'kategori' => 'Surat Masuk'])
@endsection