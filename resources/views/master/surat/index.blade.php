@extends('layout.default')

@section('title', 'Master Data Surat')
@section('content')


  <style>
    td.no-wrap {
        white-space: nowrap !important;
    }
</style>
        
            <!--begin::Container-->
            <div class="container">
              <!--begin::Notice-->
              <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                <div class="alert-icon">
                  <span class="svg-icon svg-icon-primary svg-icon-xl">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Tools/Compass.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                        <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                      </g>
                    </svg>
                    <!--end::Svg Icon-->
                  </span>
                </div>
                <div class="alert-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table. 
                <br />For more info see 
                <a class="font-weight-bold" href="https://datatables.net/" target="_blank">the official home</a>of the plugin.</div>
              </div>
              <!--end::Notice-->
              <!--begin::Card-->
              <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="">Tanggal Awal</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
                        </div>
                        <input type="text" class="form-control date-picker" value="{{date('1/m/Y')}}" id="datestart"
                          placeholder="Tanggal Mulai" data-date-format="dd/mm/yyyy">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="">Tanggal Akhir</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-calendar-week"></i></div>
                        </div>
                        <input type="text" class="form-control date-picker" value="{{date('t/m/Y')}}" id="dateend"
                          placeholder="Tanggal Mulai" data-date-format="dd/mm/yyyy">
                      </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 25px; margin-left: 0px;">
                      <button class="btn btn-primary" type="button" id="cari-data">
                        <i class="fas fa-search"></i> Cari
                      </button>
                      <button class="btn btn-secondary" type="button" id="reset-data">
                        <i class="fa fa-recycle"></i> Reset
                      </button>
                    </div>
                    {{-- <h3 class="card-label">Basic Demo 
                    <span class="d-block text-muted pt-2 font-size-sm">sorting &amp; pagination remote datasource</span></h3> --}}
                  </div>
                
                  <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{url('master/surat/create')}}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                      <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <rect x="0" y="0" width="24" height="24" />
                          <circle fill="#000000" cx="9" cy="15" r="6" />
                          <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                      </svg>
                      <ion-icon name="media/svg/icons/Home/Box.svg"></ion-icon>
                      <!--end::Svg Icon-->
                    </span>Buat Surat Baru</a>
                    <!--end::Button-->
                  </div>
                </div>
                <div class="card-body">
                  <!--begin: Datatable-->
                  <table class="table table-bordered table-checkable" id="kt_datatable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Surat</th>
                        <th>Nama File</th>
                        <th>Tanggal</th>
                        <th>Doc Status</th>
                        <th>Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                  </table>
                  <!--end: Datatable-->
                </div>
              </div>
            </div>
     

@endsection

{{-- Styles Section --}}
@section('styles')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection


{{-- Scripts Section --}}
@section('scripts')
{{-- vendors --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script>

    $(document).ready(function () {
        // load_data();

            var from = $('#datestart').val();
            var to = $('#dateend').val();
            // console.log('from', from, 'to', to);
            load_data(from, to);
            $("#cari-data").trigger("click");
            $('.date-picker').datepicker({
              autoclose: true,
              format: "dd/mm/yyyy",
              immediateUpdates: true,
              todayBtn: true,
              todayHighlight: true
	          });


        $("#cari-data").click(function () {
        var from_date = $("#datestart").val();
        var to_date = $('#dateend').val();

        if (from_date != '' && to_date != '') {
          $("#kt_datatable").DataTable().destroy();
          load_data(from_date, to_date);
        } else {
          // toastr.warning("Data tanggal kosong")
        }
	    });
    });
    
    function load_data(from = '', to = '') {
        $("#kt_datatable").DataTable({
            processing: true,
            serverSide: true,
            destroy:true,
            // responsive: true,
            scrollX: true,
            ajax: {
                url: `{{url("api/master/list")}}`,
                type: "GET",
                data: {
                  from_date: from,
                  to_date: to,
                },
                dataType: "JSON",
            },
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'file', name: 'file'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'doc_status', name: 'doc_status'},
                {data: 'aksi', name: 'aksi', width: '18%'}
            ],
            order: [
                [0, 'asc']
            ],
        })
        .on('error.dt', function (e, settings, techNote, message) {
            console.log('An error has been reported by DataTables: ', message);
        });
    }

   
</script>

{{-- @section('script')
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
    </script> --}}
    @include('component.approval-modal', ['document' => 'Surat Masuk', 'url' => 'surat', 'table' => 'example1', 'kategori' => 'Surat Masuk'])
@endsection