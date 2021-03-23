@extends('admin/layouts/master')
@section('content')
<div class="content container-fluid">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<h4 class="page-title">Add Designation</h4>
                            {!! Form::open(['route' => 'designation.store','method'=>'post']) !!}
							    <div class="form-group">
                                {!! Form::label('department_name', 'Department Name *') !!}
                                 {!! Form::select('department_id', $department,null, ['class' =>'form-control','required','placeholder'=>'Select department name']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('name', 'Designation Name *') !!}
                                 {!! Form::text('name', '', ['class' =>'form-control','required']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('status1', 'Active') !!}
                                 {!! Form::radio('status', 'Active', true) !!}
                                 {!! Form::label('status2', 'Inactive') !!}
                                 {!! Form::radio('status', 'Inactive') !!}
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Create Designation</button>
								</div>
                            {!! Form::close() !!}
                            <!-- <form>
								<div class="form-group">
									<label>Designation Name <span class="text-danger">*</span></label>
									<input class="form-control" required="" type="text">
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Create Designation</button>
								</div>
							</form> -->
						</div>
							
					</div>
</div>
@endsection