@if (count($errors->all()) > 0)
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.error') }}</h4>
	{{ Lang::get('general.check_profile') }}
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.success') }}</h4>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.error') }}</h4>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.warning') }}</h4>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.info') }}</h4>
	{{ $message }}
</div>
@endif
