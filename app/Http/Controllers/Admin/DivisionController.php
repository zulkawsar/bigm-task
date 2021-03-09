<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function __construct () 
    {
        $this->title     = 'Divisions';
        $this->route     = 'admin.divisions.';
        $this->view      = 'backend.division.';
        $this->file_folder = 'divisions';
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

        $data['divisions'] = Division::latest()->paginate(10);
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
        $input = $request->only(['name']);
        $divisions = Division::create($input);

        toastr()->success('Data has been saved successfully!');
        return redirect(route($this->route.'index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['file_folder'] = $this->file_folder;

        $data['division'] = $division;

        return view($this->view.'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $this->validate($request, [
            'name' => 'required | string'
        ]);
        $input = $request->only(['name']);
        
        
        $division->update($input);

        toastr()->success('Data has been saved successfully!');
        return redirect(route($this->route.'index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();
        toastr()->success('Data has been deleted successfully!');
        return back();
    }
}
