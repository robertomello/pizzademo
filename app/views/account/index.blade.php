@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
- {{ Lang::get('general.profile') }}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>{{ Lang::get('general.user_data') }}</h3>
</div>
<table class="table table-bordered">
	<tr>
		<td>{{ Lang::get('general.name') }}:</td>
		<td>{{ $user->fullName() }}</td>
	</tr>
	<tr>
		<td>{{ Lang::get('general.email') }}:</td>
		<td>{{ $user->email }}</td>
	</tr>
	<tr>
		<td>{{ Lang::get('general.address') }}:</td>
		<td>{{ $user->address }}</td>
	</tr>
	<tr>
		<td>{{ Lang::get('general.phone_number') }}:</td>
		<td>{{ $user->phone_number }}</td>
	</tr>
</table>
@stop
