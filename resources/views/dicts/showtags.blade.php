@extends('layouts.comm')
@section('css')
	@include('comm.upload_pic_css')
	<link rel="stylesheet" href="{{asset('static/pic_article/amazeui.min.css')}}">
	<link rel="stylesheet" href="{{asset('static/pic_article/admin.css')}}">
	<link rel="stylesheet" href="{{asset('static/pic_article/app.css')}}">
@endsection
@section('jquery')
	<script></script>
@endsection
@section('content')
	<section id="section4" class="section-white" style="">
		<div class="container" style="">
			<div class="row">
				<div class="col-md-12">
					<div>
						<form action="" method="post"  enctype="multipart/form-data">
							<input type="hidden" name="_token"   value="{{csrf_token()}}"/>
							<div class="tab-content">
								<div class="row">
									<div class="col-md-6">
										<div class="box box-info ">
											<div class="container col-md-8" >
												<br>
												<div class="form-group">
													<label class="">标签名称：</label>
													<input name="name"   class="form-control" type="text" value="{{$tags[0]->name}}"></input>
												</div>
												<div class="form-group">
													<label class="">标签名称2：</label>
													<input name="name2"   class="form-control" type="text" value="{{$tags[0]->name2}}"></input>
												</div>
												<div class="form-group">
													<label class="">简介：</label>
													<textarea name="body"   class="form-control" type="text">{{$tags[0]->body}}</textarea>
												</div>
												<div class="form-group ">
													<label class="">请上传封面：</label>
													<input type="file" value="" onchange="file()" name="icon[]" id="demo-fileInput-7"  multiple>
													@if($tags[0]->icon!="")
														<img class="file-on" style="width:350px; height: 200px;"  src="{{$tags[0]->icon}}" />
													@endif
													<script>
														function file(){
															$(".file-on").hide();
														}
													</script>
												</div>
												<div class="form-group col-md-12" >
													<button class="btn btn-info" type="submit">提交</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="tpl-page-container" style="" >
			<div class=""  >
				<div class="tpl-portlet-components" style="background-color: #E9ECF3" >
					<div class="portlet-title" >
						<div class="caption font-green bold">
							图文列表
						</div>
						<div style="float:right;" class="right">
							<a href="{{url("photos/index/$id")}}" class="btn btn-lg btn-primary" >添加图文</a>
							<button class="btn btn-lg btn-danger" onclick="check()">排序</button>
						</div>
					</div>
					<div class="tpl-block">
						<div class="am-g" id="multi">
							<div class="tpl-table-images tile__list" >
								@foreach($photos as $p)
									<div   class="am-u-sm-12 am-u-md-6 am-u-lg-4 {{$p->id}} "  >
										<input hidden="hidden" value="{{$p->id}}" class="id_hidden">
										<div class="tpl-table-images-content" style="background-color: #fff">

											<div class="tpl-i-title">
												{{$p->title}}
											</div>
											<a href="javascript:;" class="tpl-table-images-content-i">
												<img  src="{{$p->url}}" style="height:200px" alt="">
											</a>
											<div class="tpl-table-images-content-block">
												<div class="tpl-i-font" style="word-break: break-all;height: 50px" >
													{{$p->body}}
												</div>
												<div class="tpl-i-more">
													<ul>
													</ul>
												</div>
												<div class="am-btn-toolbar">
													<div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
														<a type="button" href="{{url("photos/edit/{$p->id}")}}"   class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-edit"></span> 编辑</a>
														<button type="button"  onclick="delete_photos({{$p->id}})" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
								@include('dicts.showtagsjs')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('comm.success_message')
	<script src="{{asset('static/sortable/Sortable.js')}}" type="text/javascript"></script>
	<script src="http://cdn.bootcss.com/angular.js/1.2.32/angular.min.js"></script>
	<script src="{{asset('static/sortable/app.js')}}"></script>
	@include('comm.upload_pic_js')
@endsection


