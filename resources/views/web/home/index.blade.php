@extends('web.common.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                	<form id="form" class="form-material" method="POST" action="">
                	    @csrf
                	    <div class="form-row">
                	    	<div class="form-group col-md-6">
                	    	    <label>Name</label>
                	    	    <input type="text" class="form-control" name="name" required placeholder="name"/>
                	    	</div>
                	    	<div class="form-group col-md-6">
                	    	    <label>Email</label>
                	    	    <input type="email" class="form-control" name="email" required placeholder="email"/>
                	    	</div>
                	    </div>
                        <div class="form-group">
                            <label>Mailing Address</label>
                            <textarea id="textarea" name="mailing_address" class="form-control" rows="3" placeholder="Enter your mailing address" required></textarea>
                        </div>
                        <div class="form-row">
                        	<div class="form-group col-md-4">
                                <label for="division" class="col-form-label">Division</label>
                                <select id="divison" class="form-control divison" name="division_id" required>
                                    <option value="">Choose</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        	<div class="form-group col-md-4">
                                <label for="district" class="col-form-label">District</label>
                                <select id="district" class="form-control district" name="district_id" required>
                                    <option value="">Choose</option>
                                </select>
                            </div>
                        	<div class="form-group col-md-4">
                                <label for="thana" class="col-form-label">Upazila / Thana</label>
                                <select id="thana" class="form-control thana" name="thana_upzila_id" required>
                                    <option value="">Choose</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address Details</label>
                            <textarea id="textarea" name="address_details" class="form-control" rows="3" placeholder="Enter your address" required></textarea>
                        </div>
                        <div class="form-row">
                            <label>Language Proficiency</label>
                            <div class="form-group col-md-12">
	                        	<div class="form-check form-check-inline">
	                        	  	<input class="form-check-input" name="language[]" type="checkbox" id="inlineCheckbox1" value="bangla">
	                        	  	<label class="form-check-label" for="inlineCheckbox1">Bangla</label>
	                        	</div>
	                        	<div class="form-check form-check-inline">
	                        	  	<input class="form-check-input" name="language[]" type="checkbox" id="inlineCheckbox2" value="english">
	                        	  	<label class="form-check-label" for="inlineCheckbox2">English</label>
	                        	</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="language[]" type="checkbox" id="inlineCheckbox3" value="french">
                                    <label class="form-check-label" for="inlineCheckbox3">French</label>
                                </div>
	                        </div>
                        </div>
                        <div class="form-row">
                        	<label>Education Qualification</label>
                        	<table class="table table-bordered mb-0">
                                <thead>
	                                <tr>
	                                    <th>Exam Name</th>
	                                    <th>University</th>
	                                    <th>Board</th>
	                                    <th>Result</th>
	                                    <th>Action</th>
	                                </tr>
                                </thead>
                                <tbody class="education">
	                                @include('web.addedu')
                                </tbody>
                            </table>
                        </div>

                        
                	    <div class="form-group form-float">
                            <label>Image (490x335px)</label>
                	        <div id="fileThumb" class="dropzone"></div>
                	    </div>
                	    <div class="form-group form-float">
                            <label>CV (pdf/doc)</label>
                	        <div id="fileCV" class="dropzone"></div>
                	    </div>
                        <input type="hidden" name="images" value="">
                        <input type="hidden" name="cvs" value="">
                        <input type="hidden" name="cvs" value="">
                        <div class="form-row">
                            <label>Training</label>
                            <div class="form-group col-md-12 training">
                    	        <div class="form-check form-check-inline">
                    	          <input class="form-check-input" type="radio" name="training" id="one" value="yes">
                    	          <label class="form-check-label" for="one">Yes</label>
                    	        </div>
                    	        <div class="form-check form-check-inline">
                    	          <input class="form-check-input" type="radio" name="training" id="two" value="no">
                    	          <label class="form-check-label" for="two">No</label>
                    	        </div>
                            </div>

                            <div id="training">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Training Name</th>
                                            <th>Training Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="training_table">
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="float-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input class="submit btn btn-info" type="submit" value="Submit">
                        </div>
                       
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')
@include('web.common.includes.resize-dropzone')
@include('web.common.includes.dropzone')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{asset('backend/assets/libs/parsleyjs/parsley.min.js')}}"></script>
<script type="text/javascript">
    $('#form').parsley()
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('.education tr').find('button.delete').hide();
        $('#training').hide();

        $('select[name=division_id]').change(function(){
            generateDistrict();
        });

        $('select[name=district_id]').change(function(){
            generateThana();
        });

        $('input[type=radio][name=training]').change(function() {
            var val = $('input[name="training"]:checked').val();
            if (val == 'no') {
                $('#training').hide();
            }else{
                $('#training').show();
            }
            $.ajax({
                url: '{{route('get.place')}}',
                method: 'GET',
                data: {training: val},
                success:function(data){
                    $('.training_table').html(data);
                    $('.training_table tr').find('button.delete').hide();
                }
            });
        });


        function generateDistrict(){
            var division = $('select[name=division_id]').val();
            
            $.ajax({
                url: '{{route('get.place')}}',
                method: 'GET',
                data: {division: division},
                success:function(data){
                    $('#district').html(data);
                }
            });
        }

        function generateThana(){
            var district = $('select[name=district_id]').val();
            
            $.ajax({
                url: '{{route('get.place')}}',
                method: 'GET',
                data: {district: district},
                success:function(data){
                    $('#thana').html(data);
                }
            });
        }
    })
    
    
</script>
<script type="text/javascript">
    $('#form').on('submit', function(e){
        e.preventDefault();
        var formurl = '{{route('store')}}';
        $('.spring').show("slow")
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: formurl,
            type: 'POST',
            data: new FormData($("#form")[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response){
                console.log(response);
                $(".spring").fadeOut("slow");
                if(response.is === "failed"){
                    swal(response.error,{
                        icon: "error",
                    });
                }
                if(response.is === "success"){
                    swal(response.success,response.text_msg,{
                        icon: "success",
                    }).then(function() {
                        location.reload();
                    });
                    
                }
            },
            error: function(request,status,errorThrown) {
                $(".spring").fadeOut("slow");
                swal('Somethings went wrong !!',{
                    icon: "error",
                });
            }
       });
    }); 
</script>
@endsection