<?php
namespace App\Http\Controllers;
use App\Citys;
use App\Http\Requests;
use Illuminate\Http\Request;
class CitysController extends Controller
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
    /*
     *城市管理首页
     */
    public function manager(Request $request)
    {
        $rs=Citys::select('pr','code')->groupBy('pr')->get();
        return view('citys.manager')->with('citys',$rs);
    }
    /*
     * 选择城市
     */
    public function citylist(Request $request,$code){
        $rs=Citys::select('pr')->where('code','=',$code)->get();
        $citys=Citys::select('name','code')->where('pr','=',$rs[0]->pr)->get();
        return view('citys.citylist')->with(['provincename'=>$rs,'citys'=>$citys]);
    }
    /*
     * 城市信息编辑
     */
    public  function  cityinfo(Request $request,$code){
        $rs_view=Citys::where('code','=',$code)->get();
        if($request->isMethod('post')){
            //控制器验证
            $this->validate($request,[
                'cityinfo.slogan'=>'required|min:2|max:20',
                'cityinfo.summary'=>'required|min:2|max:20',
                'cityinfo.banner'=>'required'
            ],['required'=>':attribute为必填项'],[
                'cityinfo.slogan'=>'标语',
                'cityinfo.summary'=>'简介',
                'cityinfo.banner'=>'照片'
            ]);
            //vilidator类验证表单
           /* $validator= \Validator::make($request->input(),[
                'cityinfo.slogan'=>'required|min:2|max:20',
                'cityinfo.summary'=>'required|min:2|max:20',
                'cityinfo.banner'=>'required'
            ],['required'=>':attribute为必填项'],[
                'cityinfo.slogan'=>'标语',
                'cityinfo.summary'=>'简介',
                'cityinfo.banner'=>'照片'
            ]);*/
            $file=$request->file('cityinfo.banner');

            $filename='';
            if(isset($file[0])) {
                if ($file[0]->isValid()) {
                   $filenameBig=upload_one($file[0]);
                }
            }
            /*
             * 更新数据
             */
            $data=$request->input('cityinfo');
            $data['status']=isset($data['status']) ? 1 : 0;
            $rs_h=Citys::where('code','=',$code)->get();
            $rs=Citys::find($rs_h[0]->id);
            $rs->status=$data['status'];
            $rs->summary=$data['summary'];
            $rs->slogan=$data['slogan'];
            $rs->banner=$filenameBig;
           if( $rs->save()){
               $rs_view=Citys::where('code','=',$code)->get();
              return  redirect("/cityinfo/$code")->with(['success'=>'设置成功']);
           }else{
              return  redirect("/cityinfo/$code")->with(['error'=>'设置失败']);
           }
        }

        $cityname=Citys::select('name','code')->where('code','=',$code)->get();
        return view('citys.cityinfo')->with(['cityname'=>$cityname,'code'=>$code,'rs_view'=>$rs_view]);
       // return view('layouts.switch');
    }

 
   
}
