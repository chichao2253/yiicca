<?php
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::any('index','IndexController@index');
    Route::get('/','IndexController@index');
    Route::any('release',['uses'=>'ArticleController@release','as'=>'Article.release']);
    /*
    * 管理城市
    */
    Route::any('citysmanager',['uses'=>'CitysController@manager','as'=>'citys.manager']);
    /*
     * 城市列表
     */
    Route::any('citylist/{code}',['uses'=>'CitysController@citylist','as'=>'citys.citylist']);
    /*
     * 城市信息编辑页面
     */
    Route::any('cityinfo/{code}',['uses'=>'CitysController@cityinfo','as'=>'citys.cityinfo']);


});

/*
 * 插入城市路由
 *
 */
Route::any('insertcity',['uses'=>'MemberController@insertcity','as'=>'insertcity']);
/*
 * 活动宣传页面
 */
Route::any('activity0',['uses'=>'IndexController@activity0','as'=>'activity0']);
/*
 * 活动进行中的中间件
 */
Route::group(['middleware'=>['activity']],function(){
	Route::any('activity1',['uses'=>'IndexController@activity1','as'=>'activity1']);
	Route::any('activity2',['uses'=>'IndexController@activity2','as'=>'activity2']);
});


