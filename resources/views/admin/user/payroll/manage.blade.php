@extends('admin.layouts.master')
@section('content') 
<div class="content container-fluid">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<h4 class="page-title">Manage Payroll</h4>
                            {!! Form::model($payroll,['route' => ['payroll.update',$user_id],'method'=>'put']) !!}
                                <div class="form-group">
                                {!! Form::label('basic_salary', 'Basic Salary *') !!}
                                 {!! Form::number('basic_salary', null, ['class' =>'form-control','step'=>'.01',]) !!}
								</div>
                                 <div class="form-group">
                                {!! Form::label('house_rent', 'House rent *') !!}
                                 {!! Form::number('house_rent', null, ['class' =>'form-control','step'=>'.01', 'required']) !!}
								</div>
                                 <div class="form-group">
                                {!! Form::label('medical', 'Medical *') !!}
                                 {!! Form::number('medical', null, ['class' =>'form-control','step'=>'.01', 'required']) !!}
								</div>
                                 <div class="form-group">
                                {!! Form::label('travel_allowance', 'Travel allowance *') !!}
                                 {!! Form::number('travel_allowance', null, ['class' =>'form-control','step'=>'.01', 'required']) !!}
								</div>
                                 <div class="form-group">
                                {!! Form::label('daily_allowance', 'Daily allowance *') !!}
                                 {!! Form::number('daily_allowance', null, ['class' =>'form-control','step'=>'.01', 'required']) !!}
								</div>
                                 <div class="form-group">
                                {!! Form::label('gross_salary', 'Gross Salary *') !!}
                                 {!! Form::number('gross_salary', null, ['class' =>'form-control','step'=>'.01', 'required']) !!}
								</div>
                                 <div class="form-group">
                                {!! Form::label('provident_fund', 'Provident fund *') !!}
                                 {!! Form::number('provident_fund', null, ['class' =>'form-control','step'=>'.01', 'required']) !!}
								</div>
                                
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">update</button>
								</div>
                            {!! Form::close() !!}
                          
						</div>
							
					</div>
</div>
@endsection