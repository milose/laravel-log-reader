@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @foreach($locations as $location)
                <!-- start -->
                <div class="card">
                    <div class="card-header">{{ $location->name }}</div>

                    <div class="card-body">
                        <code>{{ $location->location }}</code>
                        <ul>
                            @foreach($location->files as $file)
                                <li><a target="_blank" href="/location-show/{{ $file['url'] }}">{{ $file['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div>&nbsp;</div>
                <!-- end -->
            @endforeach

        </div>
    </div>
</div>
@endsection
