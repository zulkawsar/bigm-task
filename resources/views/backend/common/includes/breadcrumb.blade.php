<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
            <h4 class="page-title">{{$title}}</h4>
            <ul class="nav pl-0">
                <li>
                    <a class="nav-link active" href="{{route($route.'index')}}"><i class="icon icon-list mr-1"></i>All {{$title}}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route($route.'create')}}"><i class="icon icon-plus mr-1"></i> Add New {{$title}}</a>
                </li>
                <li>
                    <a class="nav-link" href="#"><i class="icon icon-trash mr-1"></i>Trash</a>
                </li>
            </ul>
        </div>

    </div>
</div> 
<!-- end page title --> 