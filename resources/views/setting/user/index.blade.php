@extends('layout.app')
@section('content')

<style>
  .select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 40px;
    user-select: none;
    -webkit-user-select: none;
  }
  #wajib {
    color: red;
  }
</style>

<!-- /.content -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{isset($title) ? $title : 'User'}}</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card-tools">
                  {{-- <a href="{{ url('setting/user/create')}}" class="btn btn-primary">Tambah User</a> --}}
                  <button class="btn btn-primary" id="btn-tambah">Tambah User</button>
                </div>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    {{-- modal add karyawan --}}
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Input User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" id="data-role">
              <div class="form-group">
                <label for="exampleInputEmail1"><b>User</b><span id="wajib"> *</span></label>
                <div class="input-group mb-2">
                  <select class="select2 form-control" id="karyawan" name="karyawan"
                    placeholder="Silahkan Pilih User ..." required="" data-id="item" im-insert="true" style="width: 100%; height: 50px">
                  </select>
                </div>
                <input type="hidden" name="id" id="id">
                <span id="has-error-text" style="display: none">Bidang ini tidak boleh kosong</span>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1"><b>Role </b><span id="wajib"> *</span></label>
                <div class="input-group mb-2">
                <select class="select2-role form-control" style="width: 100%" name="role" id="role">
 
                  </select>
                </div>
                <span id="has-error-text-keterangan" style="display: none">Bidang ini tidak boleh
                  kosong</span>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
@endsection

@section('script')
    <script>
      function simpan(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $('#id').val();
        if(id == '' || id == null){
          $.ajax({
            data: $('#data-role').serialize(),
            url: "{{url('setting/user/create')}}",
            type: "POST",
            dataType: "JSON",
            success: function(res){
              $('#modal-default').modal('hide');
              console.log(res.message);
              $("#example1").DataTable().ajax.reload();
            }
          })
        } else {
          $.ajax({
            data: $('#data-role').serialize(),
            url: `{{url('setting/user/update/${id}')}}`,
            type: "POST",
            dataType: "JSON",
            success: function(res){
              $('#modal-default').modal('hide');
              console.log(res.message);
              $("#example1").DataTable().ajax.reload();
              ///besok lanjut sini
            }
          })
        }
      }

      function editView(id){
        $.ajax({
          url: `{{url('setting/user/editView/${id}')}}`,
          type: 'GET',
          dataType: 'JSON',
          success: function(res){
            console.log(res);
            $('#modal-default').modal('show');
            var karyawan = `<option value="${res.id_karyawan}" selected="selected">${res.karyawan.nama_karyawan}</option>`;
            var role = `<option value="${res.role.id}" selected="selected">${res.role.role}</option>`;
            $('#karyawan').append(karyawan);
            $('#role').append(role);
            $('#id').val(res.id);
          }
        })
      }

      function hapus(id){
          $.confirm({
            title: 'Perhatian',
            content: 'Apakah Anda Yakin akan menghapus data ini?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Hapus: function () {
                  $.ajax({
                    url: `{{url('setting/user/delete/${id}')}}`, //route
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

        $(document).ready(function(){
          $('#example1').dataTable({
              processing: true, 
              serverside: true,
              responsive: true,
              bDestroy: true,
              ajax: {
                  url: "{{url('api/setting/userlist')}}",
                  method: "GET",
                  dataType: "JSON",
              },
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5%'},
                  {data: 'karyawan', name: 'karyawan'},
                  {data: 'divisi', name: 'divisi'},
                  {data: 'jabatan', name: 'jabatan'},
                  {data: 'role', name: 'role'},
                  {data: 'aksi', name: 'aksi'}
              ],
              order: [
                  [0, 'asc']
              ]
          });

          $('#btn-tambah').click(function(){
            $('#karyawan').val('').trigger('change');
            $('#role').val('').trigger('change');
            $('#modal-default').modal('show');
          });

          $('.select2').select2({
            placeholder: "Silahkan Pilih User ...",
            ajax: {
              url: "{{url('api/select2/user')}}",
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
                      text: results.nama_karyawan,
                      id: results.id
                    }
                  })
                };
              },
              cache: true,
            }
          });

          $('.select2-role').select2({
            placeholder: "Silahkan pilih role ...",
            ajax: {
              url: "{{url('api/select2/role')}}",
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
                      text: results.role,
                      id: results.id
                    }
                  })
                };
              },
              cache: true,
            }
          })

        });
     
    </script>
@endsection