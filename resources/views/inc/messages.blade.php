@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger">
			<i class="icon fa fa-ban"></i>{{$error}}			
		</div>
	@endforeach
@endif

@if(session('success'))
	<div class="alert alert-success">
		<i class="icon fa fa-check"></i>{{session('success')}}
			
	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger">
			{{session('error')}}
	</div>
@endif