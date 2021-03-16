@extends('layout.app')

@section('title', 'Create Karyawan')
@section('content')

<!-- Main content -->
<section class="content">
    {{-- <div class="container-fluid">
        <div class="card-header">
            <h3>Form Input Data Master</h3>
        </div>
        <div class="card-body">
            <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{isset($model) ? $model->nama : ''}}"></input>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div> --}}
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->      
                <div class="card-body">
                    <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nama Karyawan</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Karyawan" name="nama" value="{{isset($model) ? $model->nama_karyawan : ''}}"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Divisi</label>
                            <select class="form-control select2bs4" id="divisi" name="divisi" style="width: 100%;">
                            </select>
                            <input type="hidden" id="v-divisi" value="{{isset($model) ? $model->id_divisi : ''}}"/>
                            <input type="hidden" id="t-divisi" value="{{isset($model->id_divisi) ? $model->divisi->nama_divisi : ''}}"/>
                          </div>

                          <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <select class="form-control select2-jabatan" id="jabatan" name="jabatan" style="width: 100%;">

                            </select>
                            <input type="hidden" id="v-jabatan" value="{{isset($model) ? $model->id_jabatan : ''}}"/>
                            <input type="hidden" id="t-jabatan" value="{{isset($model->id_jabatan) ? $model->jabatan->nama_jabatan : ''}}"/>
                          </div>
                        <div class="">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection

@section('script')
    <script>
        function getJabatan(param){
            $('#jabatan').select2({
                theme: 'bootstrap4',
                placeholder: 'Silahkan Pilih Jabatan Sesuai Divisi yang pilih',
                ajax: {
                    url: "{{url('api/select2/jabatan')}}",
                    dataType: "JSON",
                    type: "GET",
                    delay: "250",
                    data: function(params){
                        return{
                            q: params.term,
                            divisi: param
                        }
                    },
                    processResults: function(data){
                        return{
                            results: $.map(data, function(results){
                                return {
                                    text: results.nama_jabatan,
                                    id: results.id,
                                }
                            })
                        }
                    
                    },
                    cache: true
                }
            })
        }

        function onSelect(){
            var divisi = $('#v-divisi').val();
            var jabatan = $('#v-jabatan').val();

            if(divisi != '' && jabatan != ''){
                var newDivisi = $(`<option selected='selected'></option>`).val(divisi).text($('#t-divisi').val());
                $("#divisi").append(newDivisi).trigger('change');

                var newJabatan = $(`<option selected='selected'></option>`).val(jabatan).text($('#t-jabatan').val());
                $("#jabatan").append(newJabatan).trigger('change');
            }
        }

        $(document).ready(function(){
            $('#divisi').select2({
                theme: 'bootstrap4',
                placeholder: 'Silahkan Pilih Divisi',
                ajax: {
                    url: "{{url('api/select2/divisi')}}",
                    dataType: "JSON",
                    type: "GET",
                    delay: "250",
                    data: function(params){
                        return {
                            q: params.term,
                        }
                    },
                    processResults: function(data){
                        return {
                           results: $.map(data, function(results){
                               return {
                                   text: results.nama_divisi,
                                   id: results.id,
                               }
                           })
                        }
                    },
                    cache: true
                }
            })

            $('#divisi').change(function(){
                var divisi = $(this).val();
                // console.log(divisi); 
                getJabatan(divisi);       
            });

            onSelect();
           
        })
    </script>
@endsection