<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Citys extends Model
{
	//指定表名
	protected $table='citys';
	//指定id
	protected $primaryKey ='id';
	//自动维护时间戳
	public $timestamps= true;
	//批量赋值
	protected $fillable =['status','slogan','summary'];
	protected function getDateFormat(){
		return time();
	}
   
}
