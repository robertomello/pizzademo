@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
- {{ Lang::get('general.cart') }}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>{{ Lang::get('general.carts_contents') }}:</h3>
	@if (count($orders) > 0)
	<form method="post" action="">
		<input type="hidden" name="csrf_token" id="csrf_token" value="{{ Session::getToken() }}" />
		<table id="grid-wrap" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th style="width: 55%">{{ Lang::get('general.name') }}</th>
					<th style="width: 15%">{{ Lang::get('general.price') }}</th>
					<th style="width: 15%">{{ Lang::get('general.num_of_pieces') }}</th>
					<th style="width: 15%">{{ Lang::get('general.sub_total') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order)
					<tr>
						<td>{{ $order['name'] }}</td>
						<td>{{ $order['price'] }},- Ft</td>
						<td>{{ $order['count'] }}</td>
						<td>{{ $order['sub_total'] }},- Ft</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<h4>{{ Lang::get('general.total') }}: {{ $total }},- Ft</h4><br><br>
			<input type="hidden" name="mehet" value="1">
			<input type="submit" class="btn btn-primary" value="{{ Lang::get('general.finalize_purchase') }}"> 
			<a class="btn" href="{{ URL::to('order/clear') }}">{{ Lang::get('general.clear_cart') }}</a>
	</form>
	@else
	<p>A kosara üres!</p>
	@endif
</div>
@stop