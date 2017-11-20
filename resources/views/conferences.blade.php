@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{$title}}</h4></div>

                <div class="panel-body">
                    @foreach ( $conferences as $conf )
                    <div class="list-item-with-icon row">
                        <div class="col-md-4">
                            <a href="{{ url('conference', $conf['id']) }}" class="gal">
                                <img class="img-thumbnail" src="{{ asset( $conf->images()['asset_path'].$conf->images()['image_small'] ) }}" alt="">
                            </a>
                        </div>                        <div class="col-md-8">
                        <h4><a href="{{ url('conference', $conf['id']) }}">{{ $conf->acronym }} {{ $conf->year() }}, {{$conf->city->name}}, {{$conf->city->country->name}}
                        </a></h4>
                        <div>{{ $conf->start_date }} - {{ $conf->end_date }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection