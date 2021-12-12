<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\publicPost;
use App\comment;
use Image;




class publicPostControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontView.post');
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
        
		$code=rand(111111,999999);
		
		
          $data=new publicPost;

           if($request->hasfile('image'))
		  {  
			$image=$request->file('image');

			$file_name=time().'.'.$image->getClientOriginalExtension();

			$image_resize = Image::make($image->getRealPath()); 
			
			//$image_resize->resize(300,300);

			$image_resize->save('image/'.$file_name);
		
			$data->image= $file_name;
		  }


        $data->code=$code;
        $data->post=$request->post;
        $data->user_id=$request->user_id;
		
        $data->save();

		
		return back()->with('success','Your post successfully published');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
		
		$comment=comment::where('post_id','=',$code)->get();
		
		$count=count($comment);
		
        $data=publicPost::where('code',$code)->first();		
		
		
		
		
        $new= new publicPost;
		$new=publicPost::where('code',$code)->first();
		
		$new->comment=$count;
		$new->view=$data->view+1;
		$new->save();
		
		
		
		
		
		
		return view('frontView.postDetails',compact('data','comment'));
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
