<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use App\bloodDoner;
use App\applyBlood;
use App\blood;

class admin extends Controller
{



	public function __construct(){
		
		$this->middleware('Admin');
	}

    public function index()
    {
        return view('admin.DashbordLayout.master');
    }





    public function viewDoner()
    {
        $data=bloodDoner::all();
		return view('bloodDoner.viewDoner',compact('data'));
    }




	//-------------------- jeson => searchBloodDoner ---------------------------//

    public function searchBloodDoner(Request $request)
    {
        
      $blood=$request->input('blood');
	  
      $blood_group=blood::where('id','=',$blood)->first()->blood_group;
      $doner=bloodDoner::where('blood_group','=',$blood_group)->get();
	  
      return response()->json($doner);
		
    }

	
	//-------------------- jeson => searchBloodDoner ---------------------------//

    public function searchBloodApplyer(Request $request)
    {
        
      $blood=$request->input('blood');
	  
      $blood_group=blood::where('id','=',$blood)->first()->blood_group;
      $doner=applyBlood::where('blood_group','=',$blood_group)->get();
	  
      return response()->json($doner);
		
    }

	
	
	
    public function viewApplyer()
    {
        $data=applyBlood::all();
		return view('applyBlood.viewApplyBlood',compact('data'));
    }


	
	
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
