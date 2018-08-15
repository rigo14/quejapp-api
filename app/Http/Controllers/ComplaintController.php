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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function states()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dependencies()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    /*
    public function show($id)
    {
        $complaint = $this->complaint->findOrFail($id);
        return new ComplaintResource($complaint);
    }
    */

}
