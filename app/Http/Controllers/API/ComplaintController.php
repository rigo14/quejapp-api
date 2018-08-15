<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Complaint;
use App\Http\Resources\Complaint as ComplaintResource;
//use App\Http\Requests;

class ComplaintController extends Controller
{
    /**
     * Create IoC for use it later on this controller.
     */
    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;
    }
    
    /**
     * 
     */
    public function compoundData()
    {
        $statesOrder = $this->complaint->getAsArrayCountByStatesOrder();
        $dependenciesOrder = $this->complaint->getAsArrayCountByDependenciesOrder();

        $data['statesComplaints'] = $statesOrder;
        $data['dependenciesComplaints'] = $dependenciesOrder;

        return json_encode($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = $this->complaint->all();
        return ComplaintResource::collection($complaints);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function states()
    {
        //
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function dependencies()
    {
        //
    }
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $complaint = new Complaint;
        $complaint->complaint = $request->complaint;
        $complaint->city = $request->city;
        $complaint->dependency = $request->dependency;
        $complaint->person_name = $request->person_name;
        $complaint->contact = $request->contact;
        $complaint->state_id = $request->state_id;
        if ($complaint->save())
            return new ComplaintResource($complaint);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = $this->complaint->findOrFail($id);
        return new ComplaintResource($complaint);
    }

}
