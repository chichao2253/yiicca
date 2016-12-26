@extends('layouts.comm')
@section('content')
	<div>
		<h2>字典维护</h2>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<i class="fa fa-edit"></i>
					<h3 class="box-title">所有字典</h3>
				</div>
				<div class="box-body pad table-responsive">
					<p></p>
					<table class="table table-bordered text-center">
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						@foreach($dicts as $c)
							<div class="col-md-2" style="margin-top:10px">
								<a href="{{url("dicts/info/$c->id")}}" class="btn btn-block btn-info btn-lg">
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
