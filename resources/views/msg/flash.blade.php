@if (Session::has('message'))
	<div class="alert alert-success" data-closable>
		<p>{{ Session::get('message') }}</p>
	</div>
@endif

@if (count($errors) > 0)
	<div class="alert alert-danger" data-closable>
		<p><i class="fi-alert"></i> <strong>{{ __('Your input has errors!') }}</strong></p>
	</div>
@endif
