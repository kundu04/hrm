@extends('admin/layouts/master')
@section('content')
<div class="content container-fluid">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<h4 class="page-title">Add User</h4>
                            {!! Form::open(['route' => 'user.store','method'=>'post','files'=>'true']) !!}

                            <fieldset>
								<legend>Personal Information</legend>
								<div class="form-group">
                                {!! Form::label('name', 'User Name *') !!}
                                 {!! Form::text('name', null, ['class' =>'form-control','required']) !!}
								</div>
								<div class="form-group">
                                {!! Form::label('dob', 'Date of Birth ') !!}
                                 {!! Form::date('dob', null, ['class' =>'form-control']) !!}
								</div>
								<div class="form-group">
                                {!! Form::label('contact_number', 'Contact Number* ') !!}
                                 {!! Form::text('contact_number', null, ['class' =>'form-control','required']) !!}
								</div>
								<div class="form-group">
                                {!! Form::label('address', 'Address ') !!}
                                 {!! Form::textarea('address', null, ['class' =>'form-control']) !!}
								</div>
								<div class="form-group">
                                {!! Form::label('image', 'Image ') !!}
                                 {!! Form::file('image',['class' =>'form-control']) !!}
								</div>
							</fieldset>
							<fieldset>
								<legend>Official Information</legend>
								<div class="form-group">
                                {!! Form::label('type', 'User Type') !!}
                                 {!! Form::select('type', ['Admin'=>'Admin','Employee'=>'Employee'],null, ['class' =>'form-control','required']) !!}
								</div>
								<div class="form-group">
                                {!! Form::label('department_id', 'Department Name* ') !!}
                                 {!! Form::select('department_id',$departments,null, ['class' =>'form-control','id'=>'departmentId','placeholder'=>'Select department name','required']) !!}
								</div>
								<div id='designationDiv'>
									<div class="form-group" >
									{!! Form::label('designation_id', 'Designation Name* ') !!}
									{!! Form::select('designation_id',[],null, ['class' =>'form-control','id'=>'departmentId','placeholder'=>'Select designation name','required']) !!}
									</div>
								</div>
								
							</fieldset>
							<fieldset>
								<legend>Login Information</legend>
								<div class="form-group">
                                {!! Form::label('email', 'Email*') !!}
                                 {!! Form::email('email',null, ['class' =>'form-control','required']) !!}
								</div>
								<div class="form-group">
                                {!! Form::label('password', 'Password*') !!}
                                 {!! Form::password('password', ['class' =>'form-control','id'=>'password','required']) !!}
								</div>
								<div class="form-group" id="message" style="color:red"></div>
								<div class="form-group">
                                {!! Form::label('confirmPassword', 'Confirm Password*') !!}
                                 {!! Form::password('password_confirmation', ['class' =>'form-control','id'=>'confirmPassword','required']) !!}
								</div>
								
							</fieldset>

                                <div class="form-group">
                                {!! Form::label('status1', 'Active') !!}
                                 {!! Form::radio('status', 'Active', true) !!}
                                 {!! Form::label('status2', 'Inactive') !!}
                                 {!! Form::radio('status', 'Inactive') !!}
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary" id="createUser">Create User</button>
								</div>
                            {!! Form::close() !!}
                            
						</div>
							
					</div>
</div>
@endsection
@section('scripts')
 @include('admin/user/scripts')
@endsection