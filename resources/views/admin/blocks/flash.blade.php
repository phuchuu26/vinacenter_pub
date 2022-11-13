@if(Session::has('flash_level'))
<div class="alert {!! Session::get('flash_level') !!} ">
	<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {!! Session::get('flash_message') !!}
</div>
@endif
