@extends('backend.common.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card no-b shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($divisions as $division)
                            <tr class="no-b">
                                <td>
                                    <h6>{{$division->name}}</h6>
                                </td>
                                <td>
                                    @if($division->status == 1)
                                        <span class="badge badge-success">Published</span>
                                    @elseif($division->status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <span><i class="mdi mdi-database-check mr-1"></i>{{$division->created_at->diffForHumans()}}</span><br>
                                    <span><i class=" mdi mdi-progress-clock mr-1"></i> {{$division->created_at->format('jS F Y')}}</span>
                                </td>
                                <td>
                                    <a href="{{route($route.'edit', $division->slug)}}" class="btn btn-icon btn-sm btn-primary waves-effect waves-light text-white"><i class="icon-pencil"></i></a>
                                    <a onclick="alertFunction('Delete',{{$division->id}});" class="btn btn-icon btn-sm btn-danger waves-effect waves-light text-white"><i class="icon-trash"></i></a>
                                    <form id="Delete{{$division->id}}" action="{{ route($route.'destroy', [$division->slug]) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection

@section('page-js')

@endsection