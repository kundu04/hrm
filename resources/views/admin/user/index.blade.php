@extends('admin/layouts/master')
@section('content')
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">{{$title}}</h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="{{route('user.create')}}" class="btn btn-primary rounded" ><i class="fa fa-plus"></i> Add New User</a>
						</div>
					</div>
					
					<div class="row">
						@php
						$name=null;
						if(isset($_GET['name']))
						{
							$name=$_GET['name'];
						}
						$email=null;
						if(isset($_GET['email']))
						{
							$email=$_GET['email'];
						}
						$type=null;
						if(isset($_GET['type']))
						{
							$type=$_GET['type'];
						}						
						$status=null;
						if(isset($_GET['status']))
						{
							$status=$_GET['status'];
						}
						@endphp
						{{Form::open(['method'=>'get'])}}
						<div class="col-sm-3">
							{{Form::text('name',$name,['class'=>'form-control','placeholder'=>'search user name'])}}
						</div>
						<div class="col-sm-3">
							{{Form::text('email',$email,['class'=>'form-control','placeholder'=>'search email'])}}
						</div>
						<div class="col-sm-2">
							{{Form::select('type',['Admin'=>'Admin','Employee'=>'Employee'],$type,['class'=>'form-control','placeholder'=>'Type'])}}
						</div>
						<div class="col-sm-2">
							{{Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],$status,['class'=>'form-control','placeholder'=>'Status'])}}
						</div>
						<div class="col-sm-2">
							{{Form::submit('search',['class'=>'btn btn-warning'])}}
						</div>
						{{Form::close()}}
					</div>

					<div class="row" style=padding-top:10px>
						<div class="col-md-12">
							<div>
								<table class="table table-striped custom-table m-b-0 datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Employee Id</th>
											<th>Department</th>
											<th>Designation</th>
											<th>Name</th>
											<!-- <th>DOB</th> -->
											<th>Contact Number</th>
											<!-- <th>Address</th> -->
											<th>Email</th>
											<th>Status</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($users as $user)
										<tr>
											<td>{{$user->id}}</td>
											<td>{{$user->employee_id}}</td>
											<td>{{$user->relDepartment->name}}</td>
											<td>{{$user->relDesignation->name}}</td>
											<td>{{$user->name}}</td>
											<!-- <td>{{$user->dob}}</td> -->
											<td>{{$user->contact_number}}</td>
											<!-- <td>{{$user->address}}</td> -->
											<td>{{$user->email}}</td>
											<td>{{$user->status}}</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="{{route('user.edit',$user->id)}}" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="{{route('payroll.manage',$user->id)}}" title="payroll"><i class="fa fa-pencil m-r-5"></i> Manage payroll</a></li>
														<li><a href="#"  title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
								<div>{{ $users->links() }}</div>

							</div>

						</div>

					</div>

@endsection