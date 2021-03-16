<tr data-index="{{$i}}">
    <input type="hidden" id="{{$name}}_{{$i}}_id" class="form-control " name="{{$name}}[{{$i}}][id]" placeholder=""
        value="{{ isset($model) ? $model->id : ''}}" data-id="id" style="width: 30px">
    <td style="width: 20px">
        <input type="text" id="{{$name}}_{{$i}}_line_no" class="form-control" name="{{$name}}[{{$i}}][line_no]"
            placeholder="" value="{{isset($model) ? $model->line_no : ''}}" readonly required="" data-id="line_no"
            im-insert="true" style="width: 50px">
    </td>
    <td >
        <textarea id="{{$name}}_{{$i}}_nama_jabatan" class="form-control" name="{{$name}}[{{$i}}][nama_jabatan]" required="" data-id="nama"
        im-insert="true">{{isset($model) ? $model->nama_jabatan : ''}}</textarea>
    </td>
    <td>
        <button type="button" class="btn  btn-primary btn-danger" style="" onclick="removeLine({{$i}})"><i
                class="fa fa-times"></i> </button></td>

</tr>
