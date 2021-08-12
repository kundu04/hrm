@extends('admin/layouts/master')
@section('content')
<div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">{{$title}}</h4>
						</div>
						
						<div class="col-sm-4 text-right m-b-30">
						@if(auth()->user()->type=='Admin')
						
							<a href="{{route('user.edit',$users->id)}}" class="btn btn-primary rounded"><i class="fa fa-plus"></i> Edit Profile</a>
						@endif
						</div>
					</div>
					<div class="card-box">
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
									<div class="profile-img-wrap">
										<div class="profile-img">
											<a href="#"><img class="avatar" src="{{asset('user_images/'.$users->id.'.png')}}" alt=""></a>
										</div>
									</div>
									<div class="profile-basic">
										<div class="row">
											<div class="col-md-5">
												<div class="profile-info-left">
													<h3 class="user-name m-t-0 m-b-0">{{$users->name}}</h3>
													<small class="text-muted">{{$users->relDesignation->name}}</small>
													<div class="staff-id">{{$users->emplyee_id}}</div>
												</div>
											</div>
											<div class="col-md-7">
												<ul class="personal-info">
													<li>
														<span class="title">Phone:</span>
														<span class="text"><a href="#">{{$users->contact_number}}</a></span>
													</li>
													<li>
														<span class="title">Email:</span>
														<span class="text"><a href="#">{{$users->email}}</a></span>
													</li>
													<li>
														<span class="title">Birthday:</span>
														<span class="text">{{$users->dob}}</span>
													</li>
													<li>
														<span class="title">Address:</span>
														<span class="text">{{$users->address}}</span>
													</li>
													<li>
														<span class="title">User Type:</span>
														<span class="text">{{$users->type}}</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="card-box m-b-0">
								<h3 class="card-title">Payroll</h3>
								
								@if(auth()->user()->type=='Admin')
                        			<a href="{{ route('payroll.manage',$users->id) }}" class="btn btn-primary rounded"><i class="fa fa-plus"></i> Edit Payroll</a>
                    			@endif
								<hr>
								<div class="skills">
								@if($users->relPayroll != null)
									<span>Basic {{$users->relPayroll->basic_salary}}/-</span>
									<span>House Rent {{$users->relPayroll->house_rent}}/-</span> 
									<span>Medical {{$users->relPayroll->medical}}/-</span>
									<span>Travel Allowance {{$users->relPayroll->travel_allowance}}/-</span>
									<span>Daily Allowance {{$users->relPayroll->daily_allowance}}/-</span>
									<span>Gross Salary {{$users->relPayroll->gross_salary}}/-</span>
									<span>Provident Fund {{$users->relPayroll->provident_fund}}/-</span>
								@endif
								</div>
							</div>
						</div>
						<div class="col-md-9">
							<div class="card-box">
								<h3 class="card-title">Education Informations</h3>
								<div class="experience-box">
									<ul class="experience-list">
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content">
													<a href="#/" class="name">International College of Arts and Science (UG)</a>
													<div>Bsc Computer Science</div>
													<span class="time">2000 - 2003</span>
												</div>
											</div>
										</li>
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content">
													<a href="#/" class="name">International College of Arts and Science (PG)</a>
													<div>Msc Computer Science</div>
													<span class="time">2000 - 2003</span>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-box m-b-0">
								<h3 class="card-title">Experience</h3>
								<div class="experience-box">
									<ul class="experience-list">
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content">
													<a href="#/" class="name">Web Designer at Zen Corporation</a>
													<span class="time">Jan 2013 - Present (5 years 2 months)</span>
												</div>
											</div>
										</li>
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content">
													<a href="#/" class="name">Web Designer at Ron-tech</a>
													<span class="time">Jan 2013 - Present (5 years 2 months)</span>
												</div>
											</div>
										</li>
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content">
													<a href="#/" class="name">Web Designer at Dalt Technology</a>
													<span class="time">Jan 2013 - Present (5 years 2 months)</span>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
                </div>
@endsection