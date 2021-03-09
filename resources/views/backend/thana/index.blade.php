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
                            @foreach($thana_upzilas as $thana)
                            <tr class="no-b">
                                <td>
                                    <h6>{{$thana->name}}</h6>
                                </td>
                                <td>
                                    <h6>{{$thana->district->name}}</h6>
                                </td>
                                <td>
                                    @if($thana->status == 1)
                                        <span class="badge badge-success">Published</span>
                                    @elseif($thana->status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <span><i class="mdi mdi-database-check mr-1"></i>{{$thana->created_at->diffForHumans()}}</span><br>
                                    <span><i class=" mdi mdi-progress-clock mr-1"></i> {{$thana->created_at->format('jS F Y')}}</span>
                                </td>
                                <td>
                                    <a href="{{route($route.'edit', $thana->slug)}}" class="btn btn-icon btn-sm btn-primary waves-effect waves-light text-white"><i class="icon-pencil"></i></a>
                                    <a onclick="alertFunction('Delete',{{$thana->id}});" class="btn btn-icon btn-sm btn-danger waves-effect waves-light text-white"><i class="icon-trash"></i></a>
                                    <form id="Delete{{$thana->id}}" action="{{ route($route.'destroy', [$thana->slug]) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$thana_upzilas->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection

@section('page-js')

@endsection