@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add a new country</div>
                <div class="panel-body">
                    {!! Form::open(['action' => 'DiscountController@store', 'class' => 'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                    {!! Form::label('code', 'Code', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::text('code', '', ['class' => 'form-control']) !!}
                    @if ($errors->has('code'))
                        <span class="help-block">
                            <strong>{{ $errors->first('code') }}</strong>
                        </span>
                    @endif                    
                    </div>
                    </div>
                    <div class="form-group{{ $errors->has('percent') ? ' has-error' : '' }}">
                    {!! Form::label('percent', 'Discount', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                    {!! Form::number('percent', '', ['class' => 'form-control']) !!}
                    @if ($errors->has('percent'))
                        <span class="help-block">
                            <strong>{{ $errors->first('percent') }}</strong>
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
