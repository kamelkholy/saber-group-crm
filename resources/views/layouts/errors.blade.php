@if(count($errors))

<div class="form-group">
	<div class="alert alert-danger">

		<ul style="font-size: 18px;text-align: center;list-style-type: none;">
			@foreach($errors as $error)

			<li>{{$error}}</li>

			@endforeach
		</ul>

	</div>

</div>


@elseif(\Session::has('success'))
<div class="alert alert-success">
	<ul style="font-size: 20px;font-weight: bold;list-style-type: none;">
		<li><i class="fa fa-check-square-o"></i> {!! \Session::get('success') !!}</li>
	</ul>
</div>
@endif