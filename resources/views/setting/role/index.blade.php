@extends('layout.app')
@section('content')
<!-- /.content -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{isset($title) ? $title : 'Setting Role'}}</h1>
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
                  <a href="{{ url('setting/role/create')}}" class="btn btn-primary">Tambah Role</a>
                </div>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Role</th>
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
</div>
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
                    url: `{{url('setting/role/delte/${param}')}}`, //route
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
            bDestroy: true,
            ajax: {
              url: "{{url('api/setting/role')}}",
              type: "GET",
              dataType: "JSON",
            },
            columns:[
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'role', name: 'role'},
              {data: 'aksi', name: 'aksi'}
            ],
            order: [[0, 'asc']]
          })
        })
    </script>
@endsection