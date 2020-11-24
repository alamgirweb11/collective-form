<?php

namespace App\Http\Controllers;

use App\Forum;
use Exception;
use Validator;
use Illuminate\Http\Request;

class ForumController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $forums = Forum::all();
        // return view('/home',compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'photo' => 'max:2048'
        ]);
        if($validator->fails()){
              return redirect()->back()->withErrors($validator)->withInput();
        }
           $input = $request->all();
        if($request->hasFile('photo')){
             $file = $request->file('photo');
             $input['photo'] = $this->imageUpload($file);
        }
        try{
              $data = Forum::create($input);
              return redirect('/home');
        }
        catch(Exception $exception){
           return redirect()->back()->withInput();  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        $forums = Forum::where('id',$forum->id)->get();
        return view('forum.show',compact('forum','forums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
         return view('forum.edit',compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        $validator = Validator::make($request->all(),[
            'photo' => 'max:2048'
        ]);
        if($validator->fails()){
              return redirect()->back()->withErrors($validator)->withInput();
        }
           $input = $request->all();
        if($request->hasFile('photo')){
             $file = $request->file('photo');
             $input['photo'] = $this->imageUpload($file);
             $file_path = 'uploads/'.$forum['photo'];
             if($forum['photo']!=null and file_exists($file_path)){
                  unlink($file_path);
             }
        }
        try{
                $forum->update($input);
                $bug = 0;
        }
        catch(Exception $e){
                 $bug = $e->errorInfo[1];
        }
        if($bug == 0){
            return redirect('/home');
        }
        else{
            return redirect()->back()->withInput();  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {       
        $file_path = 'uploads/'.$forum['photo'];
        if($forum['photo']!=null and file_exists($file_path)){
             unlink($file_path);
        }
          $forum->delete();
          return redirect()->back();
    }
    public function imageUpload($file){
            $fileType = $file->getClientOriginalExtension();
            $fileName = rand(1,1000).date('dmyhis').".".$fileType;
            $file->move('uploads',$fileName);
            return $fileName;
    }
}
