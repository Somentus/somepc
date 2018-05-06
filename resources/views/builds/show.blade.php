@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    			<h2>by {{ $build->user->name }}</h2>
    			<br>
            	@foreach($components as $key=>$models)
            		<div class="form-group">
	            		<h3>{{ $models['0']->name() }}</h3>
						@foreach($models as $model)
							<div class="form-check">
								<input class="form-check-input" type="radio" name="{{ $key }}" id="{{ $model['name'] }}" value="{{ $model['id'] }}"
								@if($build->{(new \ReflectionClass($model))->getShortName()}()['id'] == $model['id'])
									checked
								@else
									disabled
								@endif
								>
								
								<label class="form-check-label" for="{{ $model['name'] }}">
									{{ $model['name'] }}
								</label>
							</div>
						@endforeach
            		</div>
				@endforeach
				@csrf

        </div>
    </div>
</div>
@endsection
