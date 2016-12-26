<?php

namespace App\Http\Controllers;

use App\Dicts;
use App\Http\Requests;
use App\Photos;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
class DictsController extends Controller
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
    public function index()
    {
        $rs=Dicts::all();
        return view('dicts.index')->with('dicts',$rs);
    }
    public  function  info(Request $request,$id){
        if($request->isMethod('post')){
            $file=$request->file('dicts.banner');

            if(isset($file[0])) {
                if ($file[0]->isValid()) {
                   $filenameBig=upload_one($file[0]);
                }
                $dict=Dicts::find($id);
                $dict->banner=$filenameBig;
                $dict->save();
            }
        }
        $rs=Dicts::where('id','=',$id)->get();
        $rs_tags=Dicts::find($id)->showtags()->orderBy('sort','asc')->get();
        return view('dicts.dictsinfo')->with(['dict'=>$rs,'tags'=>$rs_tags,'id'=>$id]);
    }
    /*
     * 给图文排序
     */
    public  function  sort_photo(Request $request){
            if($request->ajax()){
                $id=$request->input('id');
                $rs=Photos::find($id);
                $rs->sort=$request->input('sort');
                $rs->save();
                $arr=['var'=>$request->input('sort')];
                return response()->json($arr);
            }
    }
    /*
     * 修改图文
     */
    public function edit_photos(Request $request){
       if($request->ajax()){
           echo $request->input('photo_id');
       }
    }
    /*
     * 删除图文
     */
    public function delete_photos(Request $request){
        if($request->ajax()){
            $bool= Photos::find($request->input('id'))->delete();
            $arr=['error_code'=>'-1'];
            return response()->json($arr);
        }
    }
    /*
     * tag主页并上传图文
     */
    public  function showtags(Request $request,$id){
        if($request->isMethod('post')){

            $file=$request->file('icon');
            if(isset($file[0])) {
                if ($file[0]->isValid()) {
                    $filenameBig=upload_one($file[0]);
                }
                $rs=Tags::find($id);
                $rs->name=$request->input('name');
                $rs->name2=$request->input('name2');
                $rs->body=$request->input('body');
                $rs->icon=$filenameBig;
                if($rs->save()){
                    return redirect("showtags/$id")->with(['success'=>'修改成功']);
                }else{
                    return redirect()->back()->with(['success'=>'添加失败']);
                }
            }else{
                $rs=Tags::find($id);
                $rs->name=$request->input('name');
                $rs->name2=$request->input('name2');
                $rs->body=$request->input('body');
                if($rs->save()){
                    return redirect("showtags/$id")->with(['success'=>'修改成功']);
                }else{
                    return redirect()->back()->with(['success'=>'添加失败']);
                }

            }
        }
        $rs=Tags::where('id','=',$id)->get();
        $rs_photos=Tags::find($id)->photos()->orderBy('sort','asc')->get();
        return view('dicts.showtags')->with(['tags'=>$rs,'photos'=>$rs_photos,'id'=>$id]);
    }
    /*
     * 增加tag
     */
    function addtag(Request $request){
        if($request->ajax()){
            $tag=$request->input('tag');
            $dictid=$request->input('dictid');
            $savetag=new Tags();
            $savetag->name=$tag;
            $savetag->category=$dictid;
            if($savetag->save()){
                $arr=return_json(-1,"成功","");
            }else{
                $arr=return_json(0,"插入失败","");
            }
            return response()->json($arr);
        }
    }

}
