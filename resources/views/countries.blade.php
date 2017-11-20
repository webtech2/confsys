@extends('layouts.app')
@section('content')

<div class="container">
    @foreach ( $countries as $country )
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                <div class="panel-heading"><h4>{{ $country->name }}</h4></div>
                    @foreach ( $country->cities as $city )
                    <div class="panel-body">
                        <h4>{{ $city->name }}</h4>
                        @foreach ( $city->conferences as $conf )
                            <div class="list-item-with-icon row">
                                <div class="col-md-4">
                                <a href="{{ url('conference', $conf['id']) }}" class="gal">
                                    <img class="img-thumbnail" src="{{ asset( $conf->images()['asset_path'].$conf->images()['image_small'] ) }}" alt="">
                                </a>
                                </div>
                                <div class="col-md-8">
                                <h4><a href="{{ url('conference', $conf['id']) }}">{{ $conf->acronym }} {{ $conf->year() }}
                                </a></h4>
                                <div>{{ $conf->start_date }} - {{ $conf->end_date }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                </div></div>
            @endforeach    
</div>

@endsection