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
                                <th>Division</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($districts as $district)
                            <tr class="no-b">
                                <td>
                                    <h6>{{$district->name}}</h6>
                                </td>
                                <td>
                                    <h6>{{$district->division->name}}</h6>
                                </td>
                                <td>
                                    @if($district->status == 1)
                                        <span class="badge badge-success">Published</span>
                                    @elseif($district->status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <span><i class="mdi mdi-database-check mr-1"></i>{{$district->created_at->diffForHumans()}}</span><br>
                                    <span><i class=" mdi mdi-progress-clock mr-1"></i> {{$district->created_at->format('jS F Y')}}</span>
                                </td>
                                <td>
                                    <a href="{{route($route.'edit', $district->slug)}}" class="btn btn-icon btn-sm btn-primary waves-effect waves-light text-white"><i class="icon-pencil"></i></a>
                                    <a onclick="alertFunction('Delete',{{$district->id}});" class="btn btn-icon btn-sm btn-danger waves-effect waves-light text-white"><i class="icon-trash"></i></a>
                                    <form id="Delete{{$district->id}}" action="{{ route($route.'destroy', [$district->slug]) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$districts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection

@section('page-js')

@endsection