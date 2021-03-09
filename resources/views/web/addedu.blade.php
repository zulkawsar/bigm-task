<tr>
    <th>
    	<select class="form-control" name="exam[]">
    	    <option>Choose</option>
    	    <option>Option 1</option>
    	    <option>Option 2</option>
    	    <option>Option 3</option>
    	</select>
    </th>
    <td>
    	<select class="form-control" name="university[]">
    	    <option>Choose</option>
    	    <option>Option 1</option>
    	    <option>Option 2</option>
    	    <option>Option 3</option>
    	</select>
    </td>
    <td>
    	<select class="form-control" name="board[]">
    	    <option>Choose</option>
    	    <option>Option 1</option>
    	    <option>Option 2</option>
    	    <option>Option 3</option>
    	</select>
    </td>
    <td>
    	<input type="text" class="form-control" name="result[]">
    </td>
    <td>
    	<button type="button" class="btn btn-danger btn-xs delete" onclick="deleteEdu(this)">Delete</button>
        <button type="button" class="btn btn-info btn-xs add" onclick="getEduForm(this)">Add More</button>
    </td>
</tr>
<script type="text/javascript">
    function getEduForm(add){
        var add = add;
        $.ajax({
            url: '{{route('get.place')}}',
            method: 'GET',
            data: {addedu: 1},
            success:function(data){
                $('.education').append(data);
                $(add).parent().find('button.delete').show();
                $(add).parent().find('button.add').hide();

                $('.education tr:last').find('button.delete').hide();
            }
        });
    }
    function deleteEdu(edu){
        $(edu).parent().parent().remove();
    }
</script>