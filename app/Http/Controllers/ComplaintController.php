<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;
use App\Http\Resources\Complaint as ComplaintResource;
use App\Http\Requests;

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
    public function statesIndex()
    {
        //$complaints = $this->complaint->states();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::paginate(15);
        return ComplaintResource::collection($complaints);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        $complaint->save();
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
