<?php

namespace App\Http\Controllers;

use App\Dicts;
use App\Http\Requests;
use App\Photos;
use Illuminate\Http\Request;
class PhotosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        if($request->isMethod('post')){
            $file=$request->file('photos.banner');
            if(isset($file[0])) {
                if ($file[0]->isValid()) {
                    $filenameBig=upload_one($file[0]);
                }
                $photo=new Photos;
                $photo->url=$filenameBig;
                $photo->title=$request->input('photos.title');
                $photo->tag_id=$id;
                $photo->body=$request->input('photos.body');
                if($photo->save()){

                    return redirect("showtags/$id")->with(['success'=>'添加成功']);
                }else{
                    return redirect()->back()->with(['success'=>'添加失败']);
                }
            }

        }
        $dicts=Dicts::select('name','id')->get();
        return view('photos.index')->with('dicts',$dicts);
    }
    public function edit(Request $request,$id)
    {
        if($request->isMethod('post')){
            $file=$request->file('photos.banner');
            if(isset($file[0])) {
                if ($file[0]->isValid()) {
                    $filenameBig=upload_one($file[0]);
                }
                $photo=Photos::find($id);
                $photo->url=$filenameBig;
                $photo->title=$request->input('photos.title');
                $photo->body=$request->input('photos.body');
                $tag_id=Photos::find($id)->tags->id;
                if($photo->save()){
                    return redirect("showtags/$tag_id")->with(['success'=>'修改成功']);
                }else{
                    return redirect()->back()->with(['success'=>'添加失败']);
                }
            }else{
                $photo=Photos::find($id);
                $photo->title=$request->input('photos.title');
                $photo->body=$request->input('photos.body');
                $tag_id=Photos::find($id)->tags->id;
                if($photo->save()){
                    return redirect("showtags/$tag_id")->with(['success'=>'修改成功']);
                }else{
                    return redirect()->back()->with(['success'=>'添加失败']);
                }

            }
        }
        $rs=Photos::find($id);
        return view('photos.index')->with('photos',$rs);
    }

}
