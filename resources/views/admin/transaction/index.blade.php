@extends('admin/layouts/master')
@section('content')
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">{{$title}}</h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="{{route('transaction.create',$transaction_type)}}" class="btn btn-primary rounded" ><i class="fa fa-plus"></i> Add New {{$transaction_type}}</a>
						</div>
					</div>
					
					<div class="row">
						@php
						$transaction_id=null;
						if(isset($_GET['transaction_id']))
						{
							$transaction_id=$_GET['transaction_id'];
						}
						$client_name=null;
						if(isset($_GET['client_name']))
						{
							$client_name=$_GET['client_name'];
						}
						$transaction_head_id=null;
						if(isset($_GET['transaction_head_id']))
						{
							$transaction_head_id=$_GET['transaction_head_id'];
						}
						@endphp
						{{Form::open(['method'=>'get'])}}
						<div class="col-sm-3">
							{{Form::text('transaction_id',$transaction_id,['class'=>'form-control','placeholder'=>'transaction id'])}}
						</div>
						<div class="col-sm-3">
							{{Form::text('client_name',$client_name,['class'=>'form-control','placeholder'=>'client name'])}}
						</div>
						<div class="col-sm-4">
							{{Form::select('transaction_head_id',$transaction_heads,$transaction_head_id,['class'=>'form-control','placeholder'=>'transaction head'])}}
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
											<th>Transaction id</th>
											<th>Head</th>
											<th>Client Name</th>
											<th>Date</th>
											<th>Amount</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($transactions as $transaction)
										<tr>
											<td>{{$serial++}}</td>
											<td>{{$transaction->transaction_id}}</td>
											<td>{{$transaction->relTransactionHead->name}}</td>
											<td>{{$transaction->client}}</td>
											<td>{{date('D M Y',strtotime($transaction->date))}}</td>
											<td>{{$transaction->amount}}</td>

										
										
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													
												</div>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
								<div>{{ $transactions->links() }}</div>

							</div>

						</div>

					</div>

@endsection