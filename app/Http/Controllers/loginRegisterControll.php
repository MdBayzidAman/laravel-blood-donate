<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Users;
use App\User;
use Mail;

class loginRegisterControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }

    public function create()
    {

        return view('login.register');
    }

	 
	 //------------------register------------------//
	 
    public function store(Request $request)
    {
		
		if(User::where('email',$request->email)->first() && User::where('email',$request->email)->first()->permissions=="0"){
			
	  $ver=User::where('email',$request->email)->first();
	  $permissions=User::where('email',$request->email)->first()->permissions;
	  $id=User::where('email',$request->email)->first()->id;
	  
			
			
			$data=User::find($id);
			$data->delete();
		}
		
		$validate=$request;
		
        $validate->validate([
		'name' => 'required|max:70',
		'email' => 'required|max:70|unique:users',
		'number' => 'required|max:70',
		'password' => 'required|max:70',
		'confirmPassword' => 'required_with:password|same:password|min:4',
		
		]);
		
		if($validate){
			
		}else{
			return back()->with('warning','Sorry! your verify code is not correct');
		}
		
		
		
		
		$code=rand(1111,9999);
		
		$credentials = [
			'name'    => $request->name,
			'email' => $request->email,
			'number' => $request->number,
			'gender' => $request->gender,
			'address' => $request->address,
			'password' => $request->password,
			'code' => $code,
		];
		
		
	/* 	Mail::send('login.verifyMail',[
		
			'name' => $request->name,
			'code' => $code,
		
		],function($mail) use($request){
			
			$mail->from(env('MAIL_FROM_ADDRESS',$request->email));
			$mail->to("$request->email")->subject('Blood camp');
		
		});
		 */
		 
      $user=Sentinel::registerAndActivate($credentials);
       
      $role =Sentinel::findRoleBySlug('visitor');
	  
	  $role->users()->attach($user);
	  
	  

	  /* $name=$request->name;
        return view('login.verifyPage',[
			'name'    => $request->name,
			'email' => $request->email,
			'number' => $request->number,
			'password' => $request->password,
			'code' => $code,
		]); */
	return redirect('/verify?email='.$request->email.'&name='.$request->name);

    }
	 
	 
	 
	 
	 //------------------verify------------------//
	 
    public function verify()
    {
		
        return view('login.verifyPage');
    }
	
	
    public function verifyCode(Request $request)
    {
		//$data=User::where('code',$request->code)->first();
		
		$name=User::where('code',$request->code)->first()->name;
		$user=User::where('name',$name)->get();
		
		$count=count($user);
		
		if($count<10){
			$codeName=str_replace(' ', '', $name);
			$code=$codeName.$count;
			
		}
		
		
		
		if(User::where('code',$request->code)->first()){
			$permissions=new User;
			$permissions=User::where('code',$request->code)->first();
			
			
			$permissions->code=$code;
			$permissions->permissions=1;
			$permissions->save();
			
			return redirect('/');			
		}else{
			
		return back()->with('warning','Sorry! your verify code is not correct');
		
		}
    }
	
	
	 //------------------Resent code------------------//
	
	

    public function resent(Request $request)
    {
		
		$code=rand(1111,9999);

		if(User::where('email',$_REQUEST["email"])->first() && User::where('email',$_REQUEST["email"])->first()->permissions=="0"){
			
			$permissions=new User;
			$permissions=User::where('email',$_REQUEST["email"])->first();
			$permissions->code=$code;
			$permissions->save();
		
		}
		
		
		
		Mail::send('login.verifyMail',[
		
			'name' => $_REQUEST["name"],
			'code' => $code,
		
		],function($mail) {
			
			$mail->from(env('MAIL_FROM_ADDRESS',$_REQUEST["email"]));
			$mail->to($_REQUEST["email"])->subject('Blood camp');
		
		});
		
		return back()->with('success','please chack your email. we resent a varify code to your mail');
       
    }


	
	 //------------------login User------------------//
	
	
    public function loginUser(Request $request)
    {
        
    	 
        $user = Sentinel::authenticate($request->all());
        $permissions = Sentinel::getUser()->permissions=="1";
		
          if($user=Sentinel::check() && $permissions){

             $user_type=Sentinel::getUser()->roles()->first()->slug;
			 
			 
             if($user_type=="Admin")
				 
				return redirect('/');
    
			elseif($user_type=="visitor")
			
				return redirect('/');
				
			}else{
				
				return redirect()->back()->with('warning','Oops!! Email or Password Not Matching');
			}
		
    }


	
	 //------------------logout User------------------//
	
	
    public function logout()
	{
		Sentinel::logout();
		return redirect('/');
	}
	
	
	
	
	
    public function show($id)
    {
        
    }




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
