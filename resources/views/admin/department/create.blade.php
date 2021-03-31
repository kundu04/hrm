@extends('admin/layouts/master')
@section('content')
<div class="content container-fluid">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<h4 class="page-title">Add Department</h4>
                            {!! Form::open(['route' => 'department.store','method'=>'post']) !!}
                                <div class="form-group">
                                {!! Form::label('name', 'Department Name *') !!}
                                 {!! Form::text('name', '', ['class' =>'form-control','required']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('status1', 'Active') !!}
                                 {!! Form::radio('status', 'Active', true) !!}
                                 {!! Form::label('status2', 'Inactive') !!}
                                 {!! Form::radio('status', 'Inactive') !!}
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Create Department</button>
								</div>
                            {!! Form::close() !!}
                          
						</div>
							
					</div>
</div>
@endsection