<?php

namespace App\Http\Controllers\Admin;

use App\Models\Division;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
    	$data['title'] = 'Dashboard';
    	$data['route'] = '';
    	// $data['applicants'] = Applicant::latest()->paginate(10);
        $data['divisions'] = Division::orderBy('name', 'asc')->get();

    	$query = Applicant::latest();
        $data['name'] = '';
        $data['email'] = '';
        if ($request->ajax()) {
        	// dd($request->all());
        	if ($request->has('name') && $request->name != null) {
        		$data['name'] = $request->name;
        		$query->where('name', 'LIKE', '%' . $request->name . '%');
        	}
        	if ($request->has('email') && $request->email != null) {
        		$data['email'] = $request->email;
        		$query->where('name', 'LIKE', '%' . $request->email . '%');
        	}

        	if ($request->has('division') && $request->division != null) {
        		$data['division'] = $request->division;
        		$query->where('division_id', $request->division);
        	}

        	if ($request->has('district') && $request->district != null) {
        		$data['district'] = $request->district;
        		$query->where('district_id', $request->district);
        	}

        	if ($request->has('thana') && $request->thana != null) {
        		$data['thana'] = $request->thana;
        		$query->where('thana_upzila_id', $request->thana);
        	}

        	$data['applicants'] = $query->paginate(15);
        	return view('backend.dashboard.ajax.applicant',$data);

        }
        $data['applicants'] = $query->paginate(15);

    	// dd($data['applicants'][0]->getDistrict());
    	return view('backend.dashboard.index', $data);
    }

}
