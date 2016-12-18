<?php
namespace App\Http\Controllers;
use App\Citys;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Districts;
use Illuminate\Support\Facades\Storage;

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
            $file=$request->file('cityinfo.banner');
            $filename='';
            if(isset($file)) {
                if ($file->isValid()) {
                    $originalName = $file->getClientOriginalName(); // 文件原名
                    $ext = $file->getClientOriginalExtension();     // 扩展名
                    $realPath = $file->getRealPath();   //临时文件的绝对路径
                    $type = $file->getClientMimeType();     // image/jpeg
                    // 上传文件
                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    // 使用我们新建的uploads本地存储空间（目录）
                    $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                    $filename = "uploads/" . $filename;
                }
            }
            /*
             * 跟新数据
             */
            $data=$request->input('cityinfo');
            $data['status']=isset($data['status']) ? 1 : 0;
            $rs_h=Citys::where('code','=',$code)->get();
            $rs=Citys::find($rs_h[0]->id);
            $rs->status=$data['status'];
            $rs->summary=$data['summary'];
            $rs->slogan=$data['slogan'];
            $rs->banner=$filename;
           if( $rs->save()){
               $rs_view=Citys::where('code','=',$code)->get();
              return  redirect("/cityinfo/$code")->with(['success'=>'设置成功']);
           }else{
              return  redirect("/cityinfo/$code")->with('error','设置失败');
           }
        }

        $cityname=Citys::select('name','code')->where('code','=',$code)->get();
        return view('citys.cityinfo')->with(['cityname'=>$cityname,'code'=>$code,'rs_view'=>$rs_view]);
       // return view('layouts.switch');
    }

 
   
}
