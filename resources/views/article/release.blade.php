@extends('layouts.comm')
@section('content')
<div>
	<h2>发布文章</h2>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">文章详情 <small>编辑文章详情</small></h3>
				<!-- tools box -->
				
				<!-- /. tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body pad">
				<form id="test" action="" method="post">
					<input type="hidden" name="_token"   value="{{csrf_token()}}"/>
					<main>
							<div class="adjoined-bottom">
								<div class="grid-container">
									<div class="grid-width-100">
										<textarea id="editor" name="artcle">
										</textarea>
									</div>
								</div>
							</div>
					</main>
					<script>
					initSample();
					</script>
				</form>
			</div>
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col-->
</div>
<div class="row">
	<div class="col-md-10"></div>
	<div class="col-md-2">
		<button type="button" onclick="alertsomething()" class="btn btn-facebook">发表</button>
	</div>
</div>
<!-- ./row -->

<script>
	function alertsomething(){
		$("#test").submit();
	}
</script>



@endsection
@section('headjs')
<script src="{{asset('static/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('static/ckeditor/samples/js/sample.js')}}"></script>
@endsection
