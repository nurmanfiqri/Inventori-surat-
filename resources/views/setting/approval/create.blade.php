@extends('layout.app')

@section('title', 'Tambah Approver Surat')
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
    </style>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title">Form Pengisian Approver Surat</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{url()->current()}}">
                    @csrf
                    <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Workflow</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="nama" name="nama_workflow" value="{{isset($model) ? $model->nama_workflow : ''}}" placeholder="Nama Workflow">
                            </div>
                    </div>

                    <div class="card-body operasional">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-workflow" role="tab"
                                    aria-controls="tab-workflow" aria-selected="true">List Approver Surat</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent" style="padding: 10px">
                           <div class="tab-pane fade show active" id="tab-workflow" role="tabpanel" aria-labelledby="tab-1">
                            <template class="tmpl-line">@include('setting.approval.multiline', [
                                'i' => '__INDEX__',
                                'model' => new \App\Models\Setting\Approver,
                                'name' =>  'approver'
                             ])</template>
             
                             <button type="button" class="btn btn-success" id="add" onclick="addApprover()"><ion-icon name="add-outline"></ion-icon> Add Approver</button>
                             <div class="table-responsive mt-4">
                                 <table class="table table-bordered" id="tabel-approver" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th class="text-center">No</th>
                                             <th class="text-center">Nama Divisi</th>
                                             <th class="text-center">Nama Jabatan</th>
                                             <th class="text-center">Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($model->approver as $i => $item)
                                         @include('setting.approval.multiline', ['i' => $i, 'model' => $item, 'name' => 'approver'])   
                                         @endforeach
                                     </tbody>
                                 </table>
                                 <div id="deleteApprover"></div>
                             </div>
                            </div> 
                        </div>
                    </div>
                    

                </div>

       
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" id="btn-reset"><i class="fa fa-undo"></i>
                        Reset</button>
                    <button type="submit" class="btn btn-primary" id="btn-simpan"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.card -->

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
        var index = {{$model->approver->count()-1}};

        function addApprover(){
            var tpl = $('template.tmpl-line');

            index++;
            var template = tpl.html().replace(/__INDEX__/g, index);   
            $('#tabel-approver > tbody').append(template);
            renumberLine();
        }

        function renumberLine(){
            var index = 1;
            $('#tabel-approver tbody tr').each(function(){
                $(this).find('[data-id="line_no"]').val(index);
                index++;
            });
        }

        function removeLine(index){
            var $tr = $('[data-index="' + index + '"]');
            var line_id = $tr.find('[data-id="id"]').val();
            if(line_id !== ''){
                $('<input>').attr({
                    type: 'hidden',
                    name: 'deleteLineApprover[]',
                    value: line_id
                }).appendTo('#deleteApprover');
            }
            $tr.remove();
            renumberLine();
        }
    </script>
@endsection