@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="/builds" method="POST" >
            	<input name="id" type="hidden" value="{{ $build->id }}">

            	<h2>{{ $build->name }}</h2>
           		<h4>By {{ $build->user->name }}</h4>
    			<hr>

    			<h5>Name of the build</h5>
    			<input type="text" class="form-control" name="name" id="name" value="{{ $build->name }}">
    			<br>
            	@foreach($components as $key=>$models)
            		<div class="form-group">
	            		<h3>{{ $models['0']->name() }}</h3>
						@foreach($models as $model)
							<div class="form-check">
								<input class="form-check-input" type="radio" name="{{ $key }}" id="{{ $model['name'] }}" value="{{ $model['id'] }}"
								@if($build->{(new \ReflectionClass($model))->getShortName()}()['id'] == $model['id'])
									checked
								@endif
								>
								
								<label class="form-check-label" for="{{ $model['name'] }}">
									{{ $model['name'] }}
								</label>
							</div>
						@endforeach
            		</div>
            		<hr>
				@endforeach
				@csrf

				<button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
</div>
@endsection
