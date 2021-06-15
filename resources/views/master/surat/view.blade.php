@extends('layout.default')

@section('title', 'Form Detail Surat')
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
              <div class="card-header">
                <h3 class="card-title">Informasi Surat</h3>
                <div class="card-toolbar">
                  <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                    <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <h6>Nomor Surat</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>:</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>-</h6>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <h6>Judul Surat</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>:</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>{{isset($model) ? $model->nama : ''}}</h6>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <h6>Instansi</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>:</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>{{isset($model) ? $model->instansi : ''}}</h6>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <h6>Jenis Surat</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>:</h6>
                    </div>
                    <div class="col-lg-4">
                      <label id="preview" class="badge text-white mt-2" style="{{isset($model->jenis_surat) ? 'background-color:'.$model->jenis_surat->warna : ''}}">{{isset($model->jenis_surat->warna) ? $model->jenis_surat->jenis_surat : ''}}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <h6>Sifat Surat</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>:</h6>
                    </div>
                    <div class="col-lg-4">
                      <label id="preview" class="badge text-white mt-2" style="{{isset($model->sifat_surat) ? 'background-color:'.$model->sifat_surat->warna : ''}}">{{isset($model->sifat_surat->warna) ? $model->sifat_surat->sifat_surat : ''}}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <h6>Prioritas Surat</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>:</h6>
                    </div>
                    <div class="col-lg-4">
                      <label id="preview" class="badge text-white mt-2" style="{{isset($model->prioritas_surat) ? 'background-color:'.$model->prioritas_surat->warna : ''}}">{{isset($model->prioritas_surat->warna) ? $model->prioritas_surat->prioritas_surat : ''}}</label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-4">
                      <h6>Tanggal Surat</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>:</h6>
                    </div>
                    <div class="col-lg-4">
                      <h6>{{isset($model) ? $model->tanggal : ''}}</h6>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-12">
                      <div class="input-group mb-2">
                        <div class="custom-file">
                        
                          <button type="reset" class="btn btn-block btn-primary">  <i class="flaticon-download"></i>Unduh Surat</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-custom gutter-b">
              <div class="card-header">
                <h3 class="card-title">Riwayat Surat</h3>
                <div class="card-toolbar">
                  <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                    <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div id="table-approverlog" class="box-body table-responsive" style="padding:20px;">
                    <table class="table table-bordered" id="tabel-approverlog" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Aksi</th>
                          <th>Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>

@endsection

@section('scripts')
    <script>
      var id = "{{$model->id}}";

      function approverlog(id) {
		// $('#total, #keterangan').attr('readonly', true);
		$.ajax({
			url: `{{url('api/approver-log/list/${id}?document=Surat Masuk&kategori=Surat Masuk')}}`,
			type: "GET",
			dataType: "JSON",
			success: function (response) {
				var $table = $('#table-approverlog tbody');
				$table.html('');
				var no = 1;
				$.each(response, function (i, e) {
					$table.append('<tr></tr>');
					$table.find('tr:last').append('<td>' + no + '</td>');
					$table.find('tr:last').append('<td>' + (e.keterangan || '-') + '</td>');
					$table.find('tr:last').append('<td>' + (e.tanggal) + '</td>');
					no++;
				});
			}
		});
	}


      $(document).ready(function(){
        // console.log('id', id);
        approverlog(id);
      });
    </script>
@endsection