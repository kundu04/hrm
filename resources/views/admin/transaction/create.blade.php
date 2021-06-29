@extends('admin/layouts/master')
@section('content')
<div class="content container-fluid">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<h4 class="page-title">{{$title}}</h4>
                            {!! Form::open(['route' => ['transaction.store',$transaction_type],'method'=>'post']) !!}
                                <div class="form-group">
                                {!! Form::label('transaction_name', 'transaction Name *') !!}
                                 {!! Form::select('transaction_head_id',$transaction_heads,null, ['class' =>'form-control','required','placeholder'=>'Select Transaction Head']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('client', 'client Name *') !!}
                                 {!! Form::text('client_name',null, ['class' =>'form-control','required','placeholder'=>'Select client name']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('description', 'Description *') !!}
                                 {!! Form::textarea('description',null, ['class' =>'form-control','required','placeholder'=>'Add description']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('date', 'Date *') !!}
                                 {!! Form::date('date',null, ['class' =>'form-control','required']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('amount', 'Amount *') !!}
                                 {!! Form::number('amount',null, ['class' =>'form-control','step'=>'0.01','required']) !!}
								</div>
                                
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Create transaction</button>
								</div>
                            {!! Form::close() !!}
                          
						</div>
							
					</div>
</div>
@endsection