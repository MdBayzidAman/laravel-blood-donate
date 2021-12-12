<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\blog;
use App\comment;
use Image;

class blogControll extends Controller
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
        return view('admin.blog.addBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tittle=$request->tittle;
		
		$blogName=blog::where('name',$request->tittle)->get();
		
		$count=count($blogName);
		
		
		$codeName=str_replace(' ', '-', $tittle);
		$code=$codeName.$count;
			
		
		
		
		
          $data=new blog;

           if($request->hasfile('image'))
      {  
        $image=$request->file('image');

        $file_name=time().'.'.$image->getClientOriginalExtension();

        $image_resize = Image::make($image->getRealPath());              
        $image_resize->resize(300,300);

        $image_resize->save('image/'.$file_name);
    
		$data->image= $file_name;
      }


        $data->code=$code;
        $data->tittle=$request->tittle;
        $data->cetagory=$request->cetagory;
        $data->details=$request->details;
        $data->save();

		
		return back()->with('success','please chack your email. we resent a varify code to your mail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($code)
    {
		
		$comment=comment::where('post_id','=',$code)->get();
		

		$count=count($comment);
		
        $data= new blog;
		$data=blog::where('code',$code)->first();
		
		$data->comment=$count;
		$data->view=$data->view+1;
		$data->save();
        return view('frontView.details',compact('data','comment'));
		
		
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
