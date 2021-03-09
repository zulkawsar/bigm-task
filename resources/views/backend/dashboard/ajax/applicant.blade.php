@foreach($applicants as $applicant)
<tr class="no-b">
    <td class="w-10">
        <a href="{{asset($applicant->getDefaultImage())}}">
        <img src="{{asset($applicant->getDefaultImage())}}" alt="">
        </a>
    </td>
    <td>
        <h6>{{$applicant->name}}</h6>
    </td>
    <td>
        <h6>{{$applicant->email}}</h6>
    </td>
    <td>
        <h6>{{$applicant->division->name}}</h6>
    </td>
    <td>
        <h6>{{$applicant->district->name}}</h6>
    </td>
    <td>
        <h6>{{$applicant->thanaUpazila->name}}</h6>
    </td>
    <td>
        <span><i class="mdi mdi-database-check mr-1"></i>{{$applicant->created_at->diffForHumans()}}</span><br>
        <span><i class=" mdi mdi-progress-clock mr-1"></i> {{$applicant->created_at->format('jS F Y')}}</span>
    </td>

    <td>
        @if($applicant->status == 1)
            <span class="badge badge-success">Published</span>
        @elseif($applicant->status == 0)
            <span class="badge badge-danger">Pending</span>
        @endif
    </td>
    <td>
        <a href="javascript:void(0)" class="btn btn-icon btn-sm btn-primary waves-effect waves-light text-white"><i class="icon-pencil"></i></a>
        <a href="{{ asset($applicant->getDefaultCv()) }}" class="btn btn-icon btn-sm btn-warning waves-effect waves-light text-white">View Cv</a>
    </td>
</tr>
@endforeach