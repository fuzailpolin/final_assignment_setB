<?php

namespace App\Http\Controllers;

use App\jobModel;
use Illuminate\Http\Request;
use Validator;

class JobModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.addJOb');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $job = new jobModel();
		$job->company_name = $req->company_name;
        $job->job_title = $req->job_title;
		$job->employer = $req->session()->get('name');
		$job->salary = $req->salary;
		$job->job_location= $req->job_location;
		
		if($job->save()){
			return back();
		}
		else{
			echo "Not registered.";
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jobModel  $jobModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $jobs = jobModel::where('employer', $req->session()->get('name'))
				->get();
		//return $jobs;
		return view('job.jobList')->with('jobs', $jobs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jobModel  $jobModel
     * @return \Illuminate\Http\Response
     */
	 
	public function editIndex($id){
		$jobs = jobModel::where('id', $id)
				->get();
		//return $jobs;
		return view('job.jobEdit')->with('jobs', $jobs);
	}
    public function edit(jobModel $jobModel)
    {
        //
    }
	
	public function search(Request $req){
		$check = $req->btnSubmit;
		$item = $req->search;
		if($check=="Search"){
			$jobs = jobModel::where('job_title', 'LIKE', "%{$item}%")
				->orWhere('company_name', 'LIKE', "%{$item}%")
				->orWhere('job_location', 'LIKE', "%{$item}%")
				->orWhere('salary', 'LIKE', "%{$item}%")
				->get();
				
			return view('job.jobList')->with('jobs', $jobs);
		}
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jobModel  $jobModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
		$validation = Validator::make($req->all(), [
            'job_title'=>'required',
            'job_location'=>'required',
            'company_name'=>'required',
			'salary'=>'required',
            
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
		}
		
        jobModel::where('id', $id)->update([
						'job_title' => $req->job_title,
						'job_location' => $req->job_location,
						'company_name' => $req->company_name,
						'salary' => $req->salary,
						]);
			return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jobModel  $jobModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        jobModel::where('id', $id)->delete();
		return back();
    }
}
