@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        	@foreach($builds as $build)
        		<a href="/builds/{{ $build->id }}">
	        		<h3>{{ $build->name }}</h3>
	        		{{ $build->processor()->name }}<br>
	        		{{ $build->graphic()->name }}<br>
	        		{{ $build->memory()->name }}<br>
                    <br>
	        	</a>
        	@endforeach

        </div>
    </div>
</div>
@endsection
