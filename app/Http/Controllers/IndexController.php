<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Member;
use App\Districts;
class IndexController extends Controller
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
        return view('index.welcome');
    }
   
    /*
     * 插入城市
     */
    
    public function activity0(){
    	return "活动就要开始了";
    }
    public function activity1(){
    	return "活动正在进行中";
    }
    public function activity2(){
    	return "活动结束";
    }
    public function insertcity(){
		$num=DB::table('districts')->where(['id'=>18,'name'=>'123'])->update(['name'=>'456']);
   		echo $num;
   }
   
}
