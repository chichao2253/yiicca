@extends('layouts.comm')
@section('css')
	@include('comm.upload_pic_css')
@endsection
@section('jquery')
	<script></script>
@endsection
@section('content')
	<div>
		@if(isset($photos))
		<h2 class="h2">修改图文</h2>
		@else
		<h2 class="h2">添加图文</h2>
		@endif
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="box box-info">
				<form action="@if(isset($photos)){{ url("photos/edit/$photos->id")}} @endif" method="post" class=""  enctype="multipart/form-data">
					<input type="hidden" name="_token"   value="{{csrf_token()}}"/>
					<div class=" container">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="h4">请上传照片：</label>
									<input type="file" value="" onchange="file()" name="photos[banner][]" id="demo-fileInput-7"  multiple>
									<label class="control-label" style="color: red" for="summary">{{$errors->first('photos.banner')}}</label>
									@if(isset($photos))
										@if($photos->url!="")
											<img class="file-on" style="width:350px; height: 200px;"  src="{{asset($photos->url)}}" />
										@endif
									@endif
									<script>
										function file(){
											$(".file-on").hide();
										}
									</script>
								</div>
								<div class="form-group">
									<label  class="h4">图片标题：</label>
									<input name="photos[title]" style="width: 80%" class="form-control" type="text" @if(isset($photos)) value="{{$photos->title}}" @endif>
									@if($errors->first('photos.title'))
										<label class="control-label" style="color: red" for="summary">{{$errors->first('photos.title')}}</label>
									@endif
								</div>
								<div class="form-group">
									<label  class="h4">图片介绍：</label>
									<textarea name="photos[body]" style="width: 80%"  class="form-control" type="text" >@if(isset($photos)){{$photos->body}}@endif</textarea>
									@if($errors->first('photos.body'))
										<label class="control-label" style="color: red" for="summary">{{$errors->first('photos.body')}}</label>
									@endif
								</div>
								<div class="form-group col-md-12" >
									<button class="btn btn-info" type="submit">提交</button>
								</div>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div><!-- ./row -->
	@include('comm.upload_pic_js')
@endsection
