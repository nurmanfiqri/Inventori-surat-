
<tr data-index="{{$i}}">
    <input type="hidden" id="{{$name}}_{{$i}}_id" class="form-control " name="{{$name}}[{{$i}}][id]" placeholder=""
        value="{{ isset($model) ? $model->id : ''}}" data-id="id" style="width: 30px">
    <td style="width: 20px">
        <input type="text" id="{{$name}}_{{$i}}_line_no" class="form-control" name="{{$name}}[{{$i}}][line_no]"
            placeholder="" value="{{isset($model) ? $model->line_no : ''}}" readonly required="" data-id="line_no"
            im-insert="true" style="width: 50px">
    </td>
    <td >
        <select class="form-control select2bs4" style="height: 50px;width:350px" id="{{$name}}_{{$i}}_divisi" name="{{$name}}[{{$i}}][divisi]" placeholder="Silahkan Pilih Divisi" required="" data-id="Divisi" im-insert="true"> 
            <option value="{{isset($model) ? $model->id_divisi : ''}}" selected="selected">{{isset($model) && $model->divisi ? $model->divisi->nama_divisi : ''}}</option>
        </select>
    </td>
    <td >
        <select class="form-control select2bs4" style="height: 50px;width:350px" id="{{$name}}_{{$i}}_jabatan" name="{{$name}}[{{$i}}][jabatan]" placeholder="Silahkan Pilih Jabatan" required="" data-id="jabatan" im-insert="true"> 
            <option value="{{isset($model) ? $model->id_jabatan : ''}}" selected="selected">{{isset($model) && $model->jabatan ? $model->jabatan->nama_jabatan : ''}}</option>
        </select>
    </td>
    <td>
        <button type="button" class="btn  btn-primary btn-danger" style="" onclick="removeLine({{$i}})"><i
                class="fa fa-times"></i> </button></td>

</tr>

<script>
    function getJabatan(clickLine, param){
        $('#approver_'+clickLine+'_jabatan').select2({
        placeholder: 'Silahkan pilih Jabatan ...',
        ajax: {
            url: "{{url('api/select2/jabatanLine')}}",
            type: "GET",
            delay: "250",
            data: function(params){
                return {
                    q: params.term,
                    divisi: param
                }
            },
            processResults: function(data){
                return{
                    results: $.map(data, function(item){
                        return {
                            text: item.nama_jabatan,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true,
        }
        });
    }

    $('#{{$name}}_{{$i}}_divisi').select2({
        placeholder: 'Silahkan pilih Divisi ...',
        ajax: {
            url: "{{url('api/select2/divisiLine')}}",
            type: "GET",
            delay: "250",
            data: function(params){
                return {
                    q: params.term,
                }
            },
            processResults: function(data){
                return{
                    results: $.map(data, function(item){
                        return {
                            text: item.nama_divisi,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true,
        }
    });

    var clickLine = null;
    var param = '';
    $("#tabel-approver").on('change', '[data-id="Divisi"]', function(){
        clickLine = $(this).closest('tr').data('index');
        param = $('#approver_'+clickLine+'_divisi').val();
        // console.log('index ke ', clickLine, 'param ', param);
        getJabatan(clickLine, param)
    })

</script>