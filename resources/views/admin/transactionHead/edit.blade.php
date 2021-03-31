@extends('admin/layouts/master')
@section('content')
<div class="content container-fluid">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<h4 class="page-title">Edit TransactionHead</h4>
                            {!! Form::model($transactionHeads,['route' => ['transactionHead.update',$transactionHeads->id],'method'=>'put']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'TransactionHead Name *') !!}
                                 {!! Form::text('name', null, ['class' =>'form-control','required']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('type', 'Type *') !!}
                                 {!! Form::select('type',['Income'=>'Income','Expense'=>'Expense'],null, ['class' =>'form-control','required']) !!}
								</div>
                                <div class="form-group">
                                {!! Form::label('status1', 'Active') !!}
                                 {!! Form::radio('status', 'Active', true) !!}
                                 {!! Form::label('status2', 'Inactive') !!}
                                 {!! Form::radio('status', 'Inactive') !!}
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Update TransactionHead</button>
								</div>
                            {!! Form::close() !!}
                           
						</div>
							
					</div>
</div>
@endsection