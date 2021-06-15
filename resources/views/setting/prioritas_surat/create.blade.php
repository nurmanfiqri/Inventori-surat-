@extends('layout.default')

@section('content')
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
              <div class="card-title">
                  <h3 class="card-label">Basic Demo 
                  <span class="d-block text-muted pt-2 font-size-sm">sorting &amp; pagination remote datasource</span></h3>
              </div>         
          </div>
          <div class="card-body">
          <!--begin::Form-->
          <form class="form" action="{{url()->current()}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Prioritas Surat</label>
                  <input type="text" class="form-control" placeholder="Prioritas Surat" name="prioritas_surat" value="{{isset($model) ? $model->prioritas_surat : ''}}" />
                  {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                </div>
                <div class="col-lg-6">
                  <label>Kode Label</label>
                  <input type="text" class="form-control" placeholder="Kode Label" id="kode" name="kode" value="{{isset($model) ? $model->kode : ''}}" />
                  {{-- <span class="form-text text-muted">Please enter your contact number</span> --}}
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Warna Label</label>
                  <div class="input-group">
                    <input type="color" class="form-control" id="color" name="warna" placeholder="Pilih Warna" value="{{isset($model) ? $model->warna : ''}}"/>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="la la-map-marker"></i>
                      </span>
                    </div>
                  </div>
                  {{-- <span class="form-text text-muted">Please enter your address</span> --}}
                </div>
                <div class="col-lg-6">
                  <label>Preview</label>
                  <div class="input-group">
                    <label id="preview" style="{{isset($model) ? 'background-color:'.$model->warna : ''}}" class="badge text-white mt-2">{{isset($model) ? $model->kode : ''}}</label>
                  </div>
                  {{-- <span class="form-text text-muted">Please enter your postcode</span> --}}
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-lg-6">
                  <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  <button type="reset" class="btn btn-secondary">Batal</button>
                </div>
              </div>
            </div>
          </form>
          <!--end::Form-->
          </div>
        </div>
      </div>

@endsection

@section('scripts')
    <script>
      $(document).ready(function(){
        $('#color').change(function(){
          var warna = $(this).val();
          // console.log(warna);
          var kode = $('#kode').val();
          // console.log(kode);
          $('#preview').css('background-color', warna);
          $('#preview').html(kode);
        });
      });
    </script>
@endsection