<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Member;
use App\Districts;
class MemberController extends Controller
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
        return view('layouts.comm');
    }
    public function info ($id = "默认值"){
//  	return view('member.info',[
//  	'name'=>'chichao',
//  	'age'=> '18'
//  	]);
	return Member::getMember();
    	
    }
    /*
     * 插入城市
     */
    public function insertcity(){
    	

		$num=DB::table('districts')->where(['id'=>18,'name'=>'123'])->update(['name'=>'456']);
   		echo $num;
   }
   
}
