@extends('layout.app')

@section('title', 'Role')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="card-header">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card-tools">
          <a href="{{ url('/role/create')}}" class="btn btn-primary">Tambah</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
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
                    url: `{{url('role/delete/${param}')}}`, //route
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
                url: "{{url('api/role/list')}}",
                method: "GET",
                dataType: "JSON"
              },
              columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'role', name: 'role'},
                {data: 'aksi', name: 'aksi'}
              ],
              order: [
                [0, 'asc']
              ]
            })
        })
    </script>
@endsection
