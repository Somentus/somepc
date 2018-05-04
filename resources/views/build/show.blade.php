@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="/builds" method="POST" >

            	@foreach($components as $key=>$component)
            		<div class="form-group">
	            		<h3>{{ $component['title'] }}</h3>
						@foreach($component['models'] as $model)
							<div class="form-check">
								<input class="form-check-input" type="radio" name="{{ $key }}" id="{{ $model['name'] }}" value="{{ $model['id'] }}"
								@if($chosenComponents[$key] == $model['id'])
									checked
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

				<button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
</div>
@endsection
