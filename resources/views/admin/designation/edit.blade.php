@extends('admin/layouts/master')
@section('content')
<div class="content container-fluid">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<h4 class="page-title">Edit Designation</h4>
                            {!! Form::model($designations,['route' => ['designation.update',$designations->id],'method'=>'put']) !!}
								<div class="form-group">
                                {!! Form::label('department_name', 'Department Name *') !!}
                                 {!! Form::select('department_id', $department,old('department_name'), ['class' =>'form-control','required','placeholder'=>'Select department name']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('name', 'Designation Name *') !!}
                                 {!! Form::text('name', old('name'), ['class' =>'form-control','required']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('status1', 'Active') !!}
                                 {!! Form::radio('status', 'Active', true) !!}
                                 {!! Form::label('status2', 'Inactive') !!}
                                 {!! Form::radio('status', 'Inactive') !!}
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Update Designation</button>
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