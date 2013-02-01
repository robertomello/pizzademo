@extends('layouts.default')

@section('content')
<div class="page-header">
	<h3>{{ Lang::get('general.offers') }}:</h3>
</div>
<div class="row">
	<div class="span3">
		<div class="well">
			<form id="filter">
				<fieldset>
					<h5>{{ Lang::get('general.name') }}:</h5>
					<input id="livefilter-input" type="text" placeholder="{{ Lang::get('general.type_smthng') }}"><br>
					
					<h5>{{ Lang::get('general.toppings') }}:</h5>
					@foreach ($toppings as $topping)
						<label class="checkbox" for="{{ $topping['name'] }}"><input id="{{ $topping['name'] }}" type="checkbox" rel="{{ $topping['name'] }}"> {{ $topping['name'] }}</label>
					@endforeach
				</fieldset>
			</form>
		</div>
	</div>
	<div class="span9">
		<form method="post" action="">
			<input type="hidden" name="csrf_token" id="csrf_token" value="{{ Session::getToken() }}" />
			<table id="grid-wrap" class="table table-striped table-bordered table-hover">
				<thead>
					<tr class="header-row">
						<th style="width: 10%">#</th>
						<th style="width: 20%">{{ Lang::get('general.name') }}</th>
						<th style="width: 50%">{{ Lang::get('general.toppings') }}</th>
						<th style="width: 10%">{{ Lang::get('general.price') }}</th>
						@if (Auth::check())
							<th style="width: 10%">{{ Lang::get('general.num_of_pieces') }}</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach ($pizzas as $pizza)
						<tr class="filterable">
							<td>{{ $pizza['id'] }}</td>
							<td>{{ $pizza['name'] }}</td>
							<td class="the-toppings">{{ $pizza['toppings'] }}</td>
							<td>{{ $pizza['price'] }},- Ft</td>
							@if (Auth::check())
								<td><input id="{{ $pizza['id'] }}" name="pizza_{{ $pizza['id'] }}" type="text" class="span1" placeholder="0" ></td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
			@if (Auth::check())
				<input type="submit" class="btn btn-primary" value="{{ Lang::get('general.put_to_cart') }}">
			@endif
		</form>
	</div>
</div>
<script src="{{ asset('assets/js/filter/search-filter.js') }}"></script>
<script src="{{ asset('assets/js/filter/chkb-filter.js') }}"></script>
@stop