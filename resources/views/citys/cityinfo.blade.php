@extends('layouts.comm')
@section('css')
	<link rel="stylesheet" href="{{asset('static/plugins/button/button.css')}}">
	<link rel="stylesheet" href="{{asset('static/switch/bootstrap-switch.css')}}" >
	@include('comm.upload_pic_css')
@endsection
@section('jquery')
	<script></script>
@stop
@section('content')

<a style="background-color: #00ca6d" href="{{url("citylist/$code")}}" class="button button-large button-plain button-border button-circle"><i class="fa fa-reply"></i></a>
<div class="row">
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header">
				<i class="fa fa-edit"></i>
				<h3 class="box-title">{{$cityname[0]->name}}</h3>
			</div>
			<div class="switch switch-large">
			</div>
			<div class="box-body pad table-responsive">
				<p>编辑城市信息</p>
			</div><!-- /.box -->
			<form class="" role="form" action="{{url("cityinfo/$code")}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token"   value="{{csrf_token()}}"/>
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputFile">是否上线：</label>
						<input name="cityinfo[status]"  type="checkbox" @if($rs_view[0]->status==1) checked  @endif />
					</div>
					<div class="form-group" >

						<label for="slogan">标语</label>
						<input type="text" @if(old('cityinfo')['slogan']) value="{{old('cityinfo')['slogan']}}"  @elseif($rs_view) value="{{$rs_view[0]->slogan}}"@endif  name="cityinfo[slogan]" class="form-control" id="slogan" placeholder="请输入标语">
						<label class="control-label" style="color: red" for="slogan">{{$errors->first('cityinfo.slogan')}}</label>
					</div>
					<div class="form-group">
						<label for="summary">简介</label>
						<textarea name="cityinfo[summary]"  class="form-control" id="summary" placeholder="请输入简介">@if(old('cityinfo')['summary']){{old('cityinfo')['summary']}}@elseif($rs_view){{$rs_view[0]->summary}}@endif</textarea>
						<label class="control-label" style="color: red" for="summary">{{$errors->first('cityinfo.summary')}}</label>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<b>banner:</b>
							<br><br>
							<input type="file" value="" onchange="file()" name="cityinfo[banner][]" id="demo-fileInput-7"  multiple>
							<label class="control-label" style="color: red" for="summary">{{$errors->first('cityinfo.banner')}}</label>
							@if($rs_view[0]->banner!="")
								<img class="file-on" style="width:350px; height: 200px;"  src="{{asset($rs_view[0]->banner)}}" />
							@endif
							<script>
								function file(){
									$(".file-on").hide();
								}
							</script>
						</div>
					</div>
				</div><!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">提交</button>
				</div>
			</form>
		</div>
	</div><!-- /.col -->
</div><!-- ./row -->
	@include('comm.upload_pic_js')
	<script src="{{asset('static/switch/bootstrap.min.js')}}"></script>
	<script src="{{asset('static/switch/highlight.js')}}"></script>
	<script src="{{asset('static/switch/bootstrap-switch.js')}}"></script>
	<script src="{{asset('static/switch/main.js')}}"></script>

	@if(Session::get('success'))
		<script>
			alert("设置成功");
		</script>
	@endif
	@if(Session::get('error'))
		<script>
			alert("设置失败");
		</script>
	@endif
@endsection
