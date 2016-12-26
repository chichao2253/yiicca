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
									<div class="col-md-6 ">
										<div class="box box-info ">
											<div class="container">
												<br>
												<div class="form-group">
													<label class="">字典名称</label>
													<button   class="btn btn-info" type="text">{{$dict[0]->name}}</button>
												</div>
												<div class="form-group ">
													<label class="h4">请上传照片：</label>
													<input type="file" value="" onchange="file()" name="dicts[banner][]" id="demo-fileInput-7"  multiple>
													@if($dict[0]->banner!="")
														<img class="file-on" style="width:350px; height: 200px;"  src="{{$dict[0]->banner}}" />
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
							 标签列表
						</div>
						<div style="float:right;" class="right">
							<input hidden="hidden" value="{{$dict[0]->id}}" id="dict_id">
							<button id="addlayer"  class="btn btn-danger" href="" >添加标签</button>
						</div>
					</div>
					<div class="tpl-block">
						<div class="am-g" id="multi">
							<div class="tpl-table-images tile__list" >
								@foreach($tags as $p)
                                    <a href="{{url("showtags/$p->id")}}" class="btn btn-facebook">{{$p->name}}</a>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('comm.upload_pic_js')
	@include('dicts.showtagsjs')
@endsection


