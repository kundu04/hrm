@extends('admin/layouts/master')
@section('content')
<div class="content container-fluid">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<h4 class="page-title">Edit Department</h4>
                            {!! Form::model($departments,['route' => ['department.update',$departments->id],'method'=>'put']) !!}
                                <div class="form-group">
                                {!! Form::label('name', 'Department Name *') !!}
                                 {!! Form::text('name', old('name'), ['class' =>'form-control','required']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('status1', 'Active') !!}
                                 {!! Form::radio('status', 'Active', true) !!}
                                 {!! Form::label('status2', 'Inactive') !!}
                                 {!! Form::radio('status', 'Inactive') !!}
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Update Department</button>
								</div>
                            {!! Form::close() !!}
                            <!-- <form>
								<div class="form-group">
									<label>Department Name <span class="text-danger">*</span></label>
									<input class="form-control" required="" type="text">
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Create Department</button>
								</div>
							</form> -->
						</div>
							
					</div>
</div>
@endsection