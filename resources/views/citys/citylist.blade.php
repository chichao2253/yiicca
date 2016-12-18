@extends('layouts.comm')
@section('css')
	<link rel="stylesheet" href="{{asset('static/plugins/button/button.css')}}">
@endsection
@section('content')
	<a style="background-color: #00ca6d" href="{{url('citysmanager')}}" class="button button-large button-plain button-border button-circle"><i class="fa fa-reply"></i></a>
<div class="row">
	<div class="col-md-12">

		<div class="box box-primary">
			<div class="box-header">
				<i class="fa fa-edit"></i>
				<h3 class="box-title">{{$provincename[0]->pr}}</h3>
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


							<a href="{{url("cityinfo/$c->code")}}" class="btn btn-block btn-info btn-lg">
								{{$c->name}}
							</a>
						</div>
					@endforeach
				</table>
			</div><!-- /.box -->
		</div>
	</div><!-- /.col -->
</div><!-- ./row -->

@endsection
