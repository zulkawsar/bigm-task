@extends('backend.common.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                	<form id="form" class="form-material" method="POST" action="{{route($route.'update', $district->slug)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$district->name}}" required placeholder="name"/>
                        </div>
                        <div class="form-group">
                            <label>Select Division</label>
                            <select class="form-control select2" name="division_id" required>
                                <option value="" selected>Select</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}" {{$division->id == $district->division_id ? 'selected' : ''}}>{{$division->name}}</option>
                                @endforeach
                            </select>
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
<script src="{{asset('backend/assets/libs/parsleyjs/parsley.min.js')}}"></script>
<script type="text/javascript">
    $('#form').parsley()
</script>
@endsection