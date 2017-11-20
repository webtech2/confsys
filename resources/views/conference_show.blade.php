@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{ $conf->acronym }} {{ $conf->year() }}, {{$conf->city->name}}, {{$conf->city->country->name}}</h4>
                </div>

                <div class="panel-body">
                    <h4><a href='{{ url('registration', $conf->id) }}'>Register</a></h4>
                    <p>{{ $conf->name }}</p>
                    <p>Dates: {{ $conf->start_date }} - {{ $conf->end_date }}</p>
                    <p>Rating: {{ $conf->rating }}</p>
                    <p>Registration fee: {{ $conf->price }} &euro;</p>              
                    <img src='{{ asset( $conf->images()['asset_path'].$conf->images()['image_large'] ) }}' >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection