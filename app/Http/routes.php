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
    /*
     * 字典首页
     */
    Route::any('dicts/index',['uses'=>'DictsController@index','as'=>'dicts.index']);
    /*
     * 字典详情
     */
    Route::any('dicts/info/{code}',['uses'=>'DictsController@info','as'=>'dicts.info']);
    /*
     * 添加图片
     */
    Route::any('photos/index/{id}',['uses'=>'PhotosController@index','as'=>'photos.index']);
    /*
     * 图文排序
     */
    Route::any('dicts/sort_photo',['uses'=>'DictsController@sort_photo','as'=>'dicts.sort_photo']);
    /*
     * 编辑图文
     */
    Route::any('photos/edit/{id}',['uses'=>'PhotosController@edit','as'=>'photos.edit']);
    /*
    * 删除图文
    */
    Route::any('dicts/delete_photos',['uses'=>'DictsController@delete_photos','as'=>'dicts.delete_photos']);
    /*
     * tags的主页，添加图文
     */
    Route::any('showtags/{id}',['uses'=>'DictsController@showtags','as'=>'dicts.showtags']);
    /*
    * 添加tag
    */
    Route::any('dicts/addtag',['uses'=>'DictsController@addtag','as'=>'dicts.addtag']);
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


