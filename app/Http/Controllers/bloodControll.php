<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\bloodDoner;
use App\applyBlood;

use App\division;
use App\district;
use App\upozila;
use Mail;

class bloodControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bloodDoner.joinDoner');
    }
	

    public function apply()
    {
        return view('applyBlood.applyBlood');
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
	
	
	
	
    public function districts(Request $request)
    {
      $divisions_id=$request->input('division');
	  
      $districts=district::where('division','=',$divisions_id)->get();
	  
      return response()->json($districts);
    }
	
	
	
    public function thana(Request $request)
    {
      $district=$request->input('district');
	  
      $districts=upozila::where('district','=',$district)->get();
	  
      return response()->json($districts);
    }
	




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
		'name' => 'required|max:70',
		'email' => 'required|max:70',
		'phone' => 'required|max:11',
		'blood' => 'required',
		'division' => 'required',
		'district' => 'required',
		'thana' => 'required',
		'birth' => 'required',
		'age' => 'required|max:11',
		
		]);
		
		$rand=rand(111111,999999);
		
		
		$id='D - '.$rand;
		
		$create = new bloodDoner;
		
		
		
		$divisionReq=$request->division;
		$districtReq=$request->district;
		$thanaReq=$request->thana;	
		
		$division=division::where('id',$divisionReq)->first()->division;
		$district=district::where('id',$districtReq)->first()->district;
		$thana=upozila::where('id',$thanaReq)->first()->thana;
		
		
		
		$create->name=$request->name;
		$create->email=$request->email;
		$create->phone=$request->phone;
		$create->blood_group=$request->blood;
		$create->birth=$request->birth;
		$create->address=$thana.', '.$district.', '.$division;
		$create->Age=$request->age;
		
		$create->doner_id= $id;
		
		$create->save();
		
		
		Mail::send('bloodDoner.donerMail',[
		
			'name' => $request->name,
			'id' => $id,
		
		],function($mail) use($request){
			
			$mail->from(env('MAIL_FROM_ADDRESS',$request->email));
			$mail->to("$request->email")->subject('Blood camp | Doner');
		
		});

		
		
		
		return back()->with('success','Thanks for joining a blood doner.');
		
    }

 
 
 

    public function storeApply(Request $request)
    {
        
        $request->validate([
		'name' => 'required|max:70',
		'email' => 'required|max:70',
		'phone' => 'required|max:11',
		'blood' => 'required',
		
		]);
		
		
		$rand=rand(111111,999999);
		
		
		$code='O - '.$rand;
		
		
		
		
		$create = new applyBlood;
		
		
		
		$divisionReq=$request->division;
		$districtReq=$request->district;
		$thanaReq=$request->thana;	
		
		$division=division::where('id',$divisionReq)->first()->division;
		$district=district::where('id',$districtReq)->first()->district;
		$thana=upozila::where('id',$thanaReq)->first()->thana;
		
		
		
		$create->name=$request->name;
		$create->email=$request->email;
		$create->phone=$request->phone;
		$create->blood_group=$request->blood;
		$create->hospital=$request->hospital;
		$create->address=$thana.', '.$district.', '.$division;
		$create->qantity=$request->qantity;
		$create->needDate=$request->needDate;
		
		$create->order_code=$code;
		
		$create->save();
		
		
		Mail::send('applyBlood.applyMail',[
		
			'name' => $request->name,
			'code' => $code,
			'qantity' => $request->qantity,
		
		],function($mail) use($request){
			
			$mail->from(env('MAIL_FROM_ADDRESS',$request->email));
			$mail->to("$request->email")->subject('Blood camp | Apply blood');
		
		});

		
		return back()->with('success','You successfully ordered '.$request->qantity.' bag blood. we send to your email a order code.');
		
    }

 


 //

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
