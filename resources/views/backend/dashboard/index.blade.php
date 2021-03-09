@extends('backend.common.master')

@section('content')

<div class="white my-3">
<div class="row">
    <div class="col-md-12">
        <div class="card no-b shadow">
            <div class="card-body p-2">
                <h5 class="header-title">Search</h5>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control name" name="name" required placeholder="name"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control email" name="email" required placeholder="email"/>
                    </div>
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
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card no-b shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Upazila / Thana</th>
                                <th>Insert Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('backend.dashboard.ajax.applicant')
                        </tbody>
                    </table>

                    {{$applicants->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function(){

        $('select[name=division_id]').change(function(){
            generateDistrict();
            searchApplicant();

        });

        $('select[name=district_id]').change(function(){
            generateThana();
            searchApplicant();

        });

        $('select[name=thana_upzila_id]').change(function(){
            searchApplicant();

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

    $('.name').on("keyup",function(e){
        searchApplicant();
    });
    $('.email').on("keyup",function(e){
        searchApplicant();
    });
    
    function searchApplicant(){
        var name = $('input[name=name]').val();
        var email = $('input[name=email]').val();
        var division = $('select[name=division_id]').val();
        var district = $('select[name=district_id]').val();
        var thana = $('select[name=thana_upzila_id]').val();
        console.log(district);
        $.ajax({
            url: '{{route('admin.dashboard')}}',
            method: 'GET',
            data: {name: name, email: email, division: division, district: district, thana: thana},
            success:function(data){
                $('tbody').html(data);
            }
        });
    }
    
</script>
@endsection