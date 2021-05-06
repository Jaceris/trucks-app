@if (Session::has('message'))
	<div class="" data-closable>
		<p>{{ Session::get('message') }}</p>
		<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif


@if (count($errors) > 0)
	<div class="" data-closable>
		<p><i class="fi-alert"></i> <strong>{{ __('Your input has errors') }}</strong></p>
		<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
