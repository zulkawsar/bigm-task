<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function __construct () 
    {
        $this->title     = 'districts';
        $this->route     = 'admin.districts.';
        $this->view      = 'backend.district.';
        $this->file_folder = 'districts';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;

        $data['districts'] = District::latest()->paginate(10);
        return view($this->view.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['file_folder'] = $this->file_folder;

        $data['divisions'] = Division::latest()->get();
        return view($this->view.'create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | string'
        ]);
        $input = $request->only(['name','division_id']);
        $district = District::create($input);

        toastr()->success('Data has been saved successfully!');
        return redirect(route($this->route.'index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['file_folder'] = $this->file_folder;

        $data['district'] = $district;
        $data['divisions'] = Division::latest()->get();
        return view($this->view.'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $this->validate($request, [
            'name' => 'required | string',
            'division_id' => 'required'
        ]);
        $input = $request->only(['name','division_id']);
        
        
        $district->update($input);

        toastr()->success('Data has been saved successfully!');
        return redirect(route($this->route.'index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $district->delete();
        toastr()->success('Data has been deleted successfully!');
        return back();
    }
}
