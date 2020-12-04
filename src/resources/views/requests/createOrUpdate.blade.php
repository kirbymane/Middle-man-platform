
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{isset($request) ? "Edit " . $request->name : "Create New Request"}}</h4>
                    </div>
                    <fieldset class="card-body">
                        {!! Form::open(['url' => isset($request) ? url("edit/{$request->id}") : url("create"), 'method' => 'post']) !!}
                        {{ Form::token() }}

                        <div class="form-group">
                            {{ Form::label('name', 'Request Name') }}
                            {{ Form::text('name', isset($request) ? $request->name : '', ['class' => 'form-control', 'required' => 'required']) }}

                            @error('name')
                            <p class="alert alert-danger">{{$errors->first('name')}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Request Description') }}
                            {{ Form::textarea('description', isset($request) ? $request->description : '', ['class' => 'form-control']) }}

                            @error('description')
                            <p class="alert alert-danger">{{$errors->first('description')}}</p>
                            @enderror
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Type</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        {{ Form::radio('type', 'purchase', 1, ['class'=>'form-check-input', 'id' => 'type1']) }}
                                        {{ Form::label('type1', 'Purchase', ['class' => 'form-check-label']) }}
                                    </div>
                                    <div class="form-check">
                                        {{ Form::radio('type', 'sale', '', ['class'=>'form-check-input', 'id' => 'type2']) }}
                                        {{ Form::label('type2', 'Sale', ['class' => 'form-check-label']) }}
                                    </div>
                                </div>
                            </div>

                            @error('type')
                            <p class="alert alert-danger">{{$errors->first('type')}}</p>
                            @enderror
                        </fieldset>
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
