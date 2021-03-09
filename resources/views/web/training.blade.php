
<tr>
    <th>
        <input type="text" class="form-control" name="training_name[]">
        
    </th>
    <td>
        <input type="text" class="form-control" name="training_details[]">
        
    </td>
    <td>
        <button type="button" class="btn btn-danger btn-xs delete" onclick="trainingDlt(this)">Delete</button>
        <button type="button" class="btn btn-info btn-xs add" onclick="trainingAdd(this)">Add More</button>
    </td>
</tr>

<script type="text/javascript">
    function trainingAdd(add){
        var add = add;
        $.ajax({
            url: '{{route('get.place')}}',
            method: 'GET',
            data: {training: 'on'},
            success:function(data){
                $('.training_table').append(data);
                $(add).parent().find('button.delete').show();
                $(add).parent().find('button.add').hide();

                $('.training_table tr:last').find('button.delete').hide();
            }
        });
    }
    function trainingDlt(edu){
        $(edu).parent().parent().remove();
    }
</script>