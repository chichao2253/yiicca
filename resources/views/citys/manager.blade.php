@extends('layouts.comm')
@section('content')
<div>
	<h2>查看城市</h2>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<i class="fa fa-edit"></i>
				<h3 class="box-title">省份列表</h3>
			</div>
			<div class="box-body pad table-responsive">
				<p>点击省份进入城市列表</p>
				<table class="table table-bordered text-center">
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
						@foreach($citys as $c)
						<div class="col-md-2" style="margin-top:10px">
							<a href="{{url("citylist/$c->code")}}" class="btn btn-block btn-info btn-lg">
								{{$c->pr}}
							</a>
						</div>
						@endforeach
				</table>
			</div><!-- /.box -->
		</div>
	</div><!-- /.col -->
</div><!-- ./row -->

@endsection
