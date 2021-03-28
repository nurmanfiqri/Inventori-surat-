@extends('layout.app')

@section('title', 'Form Input Surat')
@section('content')

<style>
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 38px;
        user-select: none;
        -webkit-user-select: none;
    }
</style>

<!-- Main content -->
<section class="content">
    <div class="container-fluid col-sm-6 ">
      <div class="row">

        {{-- <div class="card-header">
            <h3>Form Input Data Master</h3>
        </div>
        <div class="card-body">
            <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{isset($model) ? $model->nama : ''}}"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">File Surat</label>
                    <input type="file" class="form-control" placeholder="File Surat" onchange="loadFile(event)" name="file">{{isset($model) ? $model->file : ''}}</input>
                </div>

                <embed type="application/pdf" width="600" height="400" id="output"/>

                <div class="">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div> --}}
         <!-- Horizontal Form -->
         <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Form Input Role Akses</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url()->current()}}" method="POST">
              @csrf
              <div class="card-body col-sm-10">
                <div class="form-group row">
                  <label for="JudulSurat" class="col-sm-2 col-form-label">User</label>
                  <div class="col-sm-10">
                    <select class="form-control select2bs4" style="height: 50px;width:400px" id="karyawan" name="id_karyawan" placeholder="Silahkan Pilih User" required="" data-id="User" im-insert="true"> 
                      <option value="{{isset($model) ? $model->id_karyawan : ''}}" selected="selected">{{isset($model) && $model->karyawan ? $model->karyawan->nama_karyawan : ''}}</option>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Role" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-control select2bs4" style="height: 50px;width:400px" id="role" name="id_role" placeholder="Silahkan Pilih Role" required="" data-id="Role" im-insert="true"> 
                      <option value="{{isset($model) ? $model->id_role : ''}}" selected="selected">{{isset($model) && $model->role ? $model->role->role : ''}}</option>
                  </select>
                </div>
              <!-- /.card-body -->
              <div class="modal-footer mt-2">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.card-body -->
    </div>

            
  </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection

@section('script')
    <script>
      $(document).ready(function(){
        $('#karyawan').select2({
          placeholder: 'Silahkan Pilih User...',
          ajax: {
            url: "{{url('api/select2/karyawan')}}",
            type: "GET",
            delay: "250",
            data: function(params){
              return {
                q: params.term
              }
            },
            processResults: function(data){
              return {
                results: $.map(data, function(item){
                  return {
                    text: item.nama_karyawan,
                    id: item.id,
                  }
                })
              };
            },
            cache: true,
          }
        });

        $('#role').select2({
          placeholder: 'Silahkan Pilih Role...',
          ajax: {
            url: "{{url('api/select2/role')}}",
            type: "GET",
            delay: "250",
            data: function(params){
              return {
                q: params.term,
              }
            },
            processResults: function(data){
              return {
                results: $.map(data, function(item){
                  return {
                    text: item.role,
                    id: item.id,
                  }
                })
              };
            },
            cache: true
          }
        });
      });
    </script>
@endsection