<?php

namespace App\Http\Controllers\Web;

use App\Models\District;
use App\Models\Division;
use App\Models\Applicant;
use App\Models\ThanaUpzila;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DefaultController extends Controller
{
    public function __construct () 
    {
        $this->title     = 'Registration';
        $this->sub_title = 'Here you go!';
        $this->file_folder = 'application';
        $this->cv_folder = 'application_cv';
        $this->view      = 'web.';
    }

    
    public function index()
    {
    	$data['title'] = $this->title;
        $data['file_folder'] = $this->file_folder;
        $data['cv_folder'] = $this->cv_folder;

        $data['divisions'] = Division::orderBy('name', 'asc')->get();
    	return view($this->view.'home.index', $data);
    }

    public function getPlace(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->division)) {
                $data = District::where('division_id', $request->division)->orderBy('name', 'asc')->get();
                return view($this->view.'placeAjax')->with('data', $data);
            }
            if (!empty($request->district)) {
                $data = ThanaUpzila::where('district_id', $request->district)->orderBy('name', 'asc')->get();
                return view($this->view.'placeAjax')->with('data', $data);
            }

            if (!empty($request->addedu)) {
                return view($this->view.'addedu');
            }


            if (!empty($request->training)) {
                if ($request->training == 'no') {
                    return '';
                }
                return view($this->view.'training');
            }

            return false;
        }

        abort(404);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'required | string | max:255',
            'email'             => 'required|string|email|max:255|unique:applicants,email',
            'mailing_address'   => 'required | string | max:255',
            'division_id'       => 'required|exists:divisions,id',
            'district_id'       => 'required|exists:districts,id',
            'thana_upzila_id'   => 'required|exists:thana_upzilas,id',
            'address_details'   => 'required',
            'language'          => 'required',
            'exam'              => 'required',
            'university'        => 'required',
            'board'             => 'required',
            'result'            => 'required',
            'training'          => 'required',
        ]);
        // $validator->getMessageBag()     
        if ($validator->fails()){
            $message = $this->makeVailidationMsg($validator);;
            return response()->json(['is' => 'failed', 'error' => $message]);
        }

        $input = $request->only(['name','email','mailing_address','division_id','district_id','thana_upzila_id','address_details','language']);

        $applicant = Applicant::create($input + [
            'education' => $this->edutionSort($request),
            'training' => $this->trainingSort($request),
        ]);

        // $files = array_merge($request->images,$request->cvs);
        $applicant->syncFileIds($request->images.','.$request->cvs);
        // dd($request->images.','.$request->cvs);
        // $applicant->syncFileIds($files);

        return response()->json(['is'=>'success', 'success' => 'CONGRATULATION!!', 'text_msg' => 'YOU HAVE SUCCESSFULLY COMPLETED THE REGISTRATION!! ONE OF OUR REPRESENTATIVE WILL SHORTLY COMMUNICATE WITH YOU.']);
        
    }


    public function edutionSort($request)
    {
        $education = [];
        $i = 0;
        foreach ($request->exam as $key => $value) {
            $education[$i]['exam_name'] = $value;
            $education[$i]['university'] = $request->university[$key];
            $education[$i]['board'] = $request->board[$key];
            $education[$i]['result'] = $request->result[$key];
            $i++;
        }
        return $education;
    }

    public function trainingSort($request)
    {
        $training = [];
        $i = 0;
        $training[$i]['value'] = 'No';
        if ($request->training == 'yes') {
            $training[$i]['value'] = 'Yes';
            foreach ($request->training_name as $key => $value) {
                $education[$i]['training_name'] = $value;
                $education[$i]['training_details'] = $request->training_details[$key];
                $i++;
            }
        }
        return $training;
    }



    // validation messages
    public function makeVailidationMsg($validator)
    {
        $i =0;
        $ad[0] = 'Validation failed! Please check all required field';
        foreach ($validator->getMessageBag()->messages() as $key=>$message) {
            return $this->returnMsg($message);
        }
        
        return $ad[0];
    }

    public function returnMsg($message)
    {
        foreach ($message as $key => $value) {
            return $value;
        }
    }


}
