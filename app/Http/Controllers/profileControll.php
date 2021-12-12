<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;

class profileControll extends Controller
{
    
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index($code)
    {
		$data=User::where('code',$code)->first();
        return view('frontView.profile',compact('data'));
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
        //
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
    public function edit($code)
    {
        
		$data=User::where('code',$code)->first();
        return view('frontView.editeProfile',compact('data'));
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $data=User::where('code',$code)->first();
		
		
      if($request->hasfile('image'))
      {  
        $image=$request->file('image');
      
        $file_name=time().'.'.$image->getClientOriginalExtension();
        $old_file= $data ->image;

        $image_resize = Image::make($image->getRealPath()); 
		
        //$image_resize->resize(300,300);
		
		//$image_resize->crop(300, 500, 500, 500);
          
          if( !empty($old_file)){
             $path=("image/$old_file");
          unlink($path);
          }
         
        $image_resize->save('image/'.$file_name);

         $data->image= $file_name;
        
      }

        $data->name=$request->name;
        $data->gender=$request->gender;
        $data->save();
		
		
        return redirect('/profile/'.$code)->with('success','Update done');
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
