@extends('layout.app')

@section('title', 'Create Role & Menu Akses')
@section('content')

<!-- Main content -->
<section class="content">
    {{-- <div class="container-fluid">
        <div class="card-header">
            <h3>Form Role</h3>
        </div>
        <div class="card-body">
            <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-5 mt-5">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label pr-0"><b>Role </b></label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" name="role" id="role" placeholder="Role" value="{{isset($model) ? $model->role : ''}}">
                                <span id="pesan" style="display: none"></span>
                            </div>
                        </div>
                    </div>
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
                    <div class="container-fluid">
                        <h4>Setting Role & Menu</h4>
                        <div class="row">
                            <div class="col-md-6 mb-5 mt-5">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label pr-0"><b>Nama Role </b></label>
                                    <div class="col-sm-8">
                                        <input type="text" required class="form-control" name="role" id="role" placeholder="contoh: Admin" value="{{isset($model) ? $model->role : ''}}">
                                        <span id="pesan" style="display: none"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
					    <h5>Akses Menu <span style="color:red"> (Centang untuk memilih)</span></h5>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group header-menu">
                                <div class="mt-checkbox-list">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" class="checkedAll"><strong> Checked All</strong>
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($menu as $row)
                            <div class="col-md-4">
                                <div class="form-group header-menu">
                                    <div class="mt-checkbox-list">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" id="menu-{{$row->id}}" name="menuDetail[]" data-id="{{$row->id}}" class="parent "
                                                value="{{$row->id}}"><strong> {{$row->title}}</strong>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                @foreach ($row->sub_menu2 as $rows)
                                    <div class="form-group item-menu" style="margin-top: -10px;">
                                        <div class="mt-checkbox-list">
                                            <label class="mt-checkbox mt-checkbox-outline ml-3">
                                                <input type="checkbox" id="menu-{{$rows->id}}" data-id="{{$row->id}}" class="child"
                                                    name="menuDetail[]" value="{{$rows->id}}"> {{$rows->title}}
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

          

                    <div class="modal-footer">
                        <a href="{{url('setting/role')}}" class="btn btn-secondary" role="button" aria-pressed="true"> <i
                                class="fa fa-arrow-left"></i> Batalkan</a>
                        <button type="submit" class="btn btn-primary" id="btn-simpan"><i class="fa fa-save"></i>
                            Simpan</button>
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

    @if ($model->menu)
    <script>
        @foreach($model->menu as $r)
        $('#menu-{{$r->id_menu}}').prop('checked', true);
        @endforeach
    </script>
    @endif
    <script>
        $(document).ready(function () {
            $('.header-menu').on('click', function(){
                var checked = $(this).find('.parent').is(":checked");
                if(checked){
                    checkAll($(this).siblings('.item-menu'), true);
                }else{
                    checkAll($(this).siblings('.item-menu'), false);
                }
            });

            $('.item-menu').on('click', function(){
                var checked = $(this).find('.child').is(":checked");
                if(checked){
                    $(this).parent().find('.parent').prop('checked', true)
                }
            });

            $('.checkedAll').on('click', function(){
                var checked = $(this).is(":checked");
                if(checked){
                    $('.header-menu').parent().find('.parent').prop('checked', true)
                    $('.item-menu').parent().find('.child').prop('checked', true)
                }else{
                    $('.header-menu').parent().find('.parent').prop('checked', false)
                    $('.item-menu').parent().find('.child').prop('checked', false)
                }
            });

            function checkAll(e, checked) {
                e.find('.child').prop('checked', checked);
            }
        });
    </script>
@endsection