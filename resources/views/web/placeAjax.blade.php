<option value="">Choose</option>
@foreach($data as $d)
	<option value="{{$d->id}}">{{$d->name}}</option>
@endforeach