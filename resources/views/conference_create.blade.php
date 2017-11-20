@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add a new conference</div>
                <div class="panel-body">
                    {!! Form::open(['action' => 'ConferenceController@store', 'files' => true, 'class' => 'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('acronym') ? ' has-error' : '' }}">
                    {!! Form::label('acronym', 'Conference acronym', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::text('acronym', '', ['class' => 'form-control']) !!}
                    @if ($errors->has('acronym'))
                        <span class="help-block">
                            <strong>{{ $errors->first('acronym') }}</strong>
                        </span>
                    @endif    
                    </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::textArea('name', '', ['class' => 'form-control']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif                      
                    </div>
                    </div>
                    <div class="form-group">
                    {!! Form::label('city', 'City', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::select('city', $countries, '', ['class' => 'form-control']) !!}
                    </div>
                    </div>
                    <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                    {!! Form::label('rating', 'Rating', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::radio('rating', '1') !!}1
                    {!! Form::radio('rating', '2') !!}2
                    {!! Form::radio('rating', '3', true) !!}3
                    {!! Form::radio('rating', '4') !!}4
                    {!! Form::radio('rating', '5') !!}5
                    @if ($errors->has('rating'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rating') }}</strong>
                        </span>
                    @endif                      
                    </div>
                    </div>
                    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                    {!! Form::label('start_date', 'Start date', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::date('start_date', '', ['class' => 'form-control']) !!}
                    @if ($errors->has('start_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                    @endif                      
                    </div>
                    </div>
                    <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                    {!! Form::label('end_date', 'End date', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::date('end_date', '', ['class' => 'form-control']) !!}
                    @if ($errors->has('end_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                    @endif                     
                    </div>
                    </div>
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    {!! Form::label('price', 'Registration fee', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::text('price', '', ['class' => 'form-control']) !!}
                    @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif                     
                    </div>
                    </div>
                    <div class="form-group{{ $errors->has('image_small') ? ' has-error' : '' }}">
                    {!! Form::label('image_small', 'Thumbnail image', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::file('image_small', ['class'=>'btn btn-md']) !!}
                    @if ($errors->has('image_small'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image_small') }}</strong>
                        </span>
                    @endif                     
                    </div>
                    </div>
                    <div class="form-group{{ $errors->has('image_large') ? ' has-error' : '' }}">
                    {!! Form::label('image_large', 'Large image', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::file('image_large', ['class'=>'btn btn-md']) !!}
                    @if ($errors->has('image_large'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image_large') }}</strong>
                        </span>
                    @endif                     
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
