@extends('layouts.default')

@section('title')
@parent
- {{ Lang::get('general.login') }}
@stop

@section('content')
<div class="page-header">
	<h3>{{ Lang::get('general.login') }}</h3>
</div>
<form method="post" action="" class="form-horizontal">
	<input type="hidden" name="csrf_token" id="csrf_token" value="{{ Session::getToken() }}" />

	<div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
		<label class="control-label" for="email">{{ Lang::get('general.email') }}</label>
		<div class="controls">
			<input type="text" name="email" id="email" value="{{ Input::old('email') }}" />
		</div>
	</div>

	<div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
		<label class="control-label" for="password">{{ Lang::get('general.password') }}</label>
		<div class="controls">
			<input type="password" name="password" id="password" value="" />
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">{{ Lang::get('general.login') }}</button>
		</div>
	</div>
</form>
@stop
