@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="/builds" method="POST" >

            	<h5>Name of the build</h5>
    			<input type="text" class="form-control" name="name" id="name" placeholder="Enter build name">
    			<br>
            	@foreach($components as $key=>$models)
            		<div class="form-group">
	            		<h5>{{ $models['0']->name() }}</h5>
						@foreach($models as $model)
							<div class="form-check">
								<input class="form-check-input" type="radio" name="{{ $key }}" id="{{ $model['name'] }}" value="{{ $model['id'] }}" checked>
								<label class="form-check-label" for="{{ $model['name'] }}">
									{{ $model['name'] }}
								</label>
							</div>
						@endforeach
            		</div>
            	<br>
				@endforeach
				@csrf

				<button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
</div>
@endsection
