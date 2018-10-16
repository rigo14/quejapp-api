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
     * Create a instance of class for use it later on this controller.
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

    /*
    public function states()
    {
        //
    }
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
     * @return Json Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'nullable|numeric',
            'city' => 'nullable|string',
            'dependency_id' => 'nullable|numeric',
            'dependency' => 'nullable|string',
            'person_name' => 'nullable|string',
            'contact' => 'nullable|string',
            'complaint' => 'required|string'
        ]);

        if ($this->complaint->create($request->all()))
           return response()->json(['status' => 1], 200);     
        else
           return response()->json(['status' => -1], 200); 

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
