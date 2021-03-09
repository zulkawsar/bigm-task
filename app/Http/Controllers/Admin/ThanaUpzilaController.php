<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use App\Models\ThanaUpzila;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThanaUpzilaController extends Controller
{
    public function __construct () 
    {
        $this->title     = 'Thana Upzila';
        $this->route     = 'admin.thanas.';
        $this->view      = 'backend.thana.';
        $this->file_folder = 'thana';
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

        $data['thana_upzilas'] = ThanaUpzila::latest()->paginate(10);
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

        $data['districts'] = District::latest()->get();
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
            'name' => 'required | string',
            'district_id' => 'required'
        ]);
        $input = $request->only(['name','district_id']);
        $thana_upzila = ThanaUpzila::create($input);

        toastr()->success('Data has been saved successfully!');
        return redirect(route($this->route.'index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThanaUpzila  $thanaUpzila
     * @return \Illuminate\Http\Response
     */
    public function show(ThanaUpzila $thanaUpzila)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThanaUpzila  $thanaUpzila
     * @return \Illuminate\Http\Response
     */
    public function edit(ThanaUpzila $thanaUpzila)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['file_folder'] = $this->file_folder;

        $data['thana_upzila'] = $thanaUpzila;
        $data['districts'] = District::latest()->get();
        return view($this->view.'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThanaUpzila  $thanaUpzila
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThanaUpzila $thanaUpzila)
    {
        
        $this->validate($request, [
            'name' => 'required | string',
            'district_id' => 'required'
        ]);
        $input = $request->only(['name','district_id']);
        
        
        $thanaUpzila->update($input);

        toastr()->success('Data has been saved successfully!');
        return redirect(route($this->route.'index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThanaUpzila  $thanaUpzila
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThanaUpzila $thanaUpzila)
    {
        $thanaUpzila->delete();
        toastr()->success('Data has been deleted successfully!');
        return back();
    }
}
