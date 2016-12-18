<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Districts extends Model
{
	//指定表名
	protected $table='districts';
	//指定id
	protected $primaryKey ='id';
	//自动维护时间戳
	public $timestamps= true;
	protected function getDateFormat(){
		return time();
	}
   
}
