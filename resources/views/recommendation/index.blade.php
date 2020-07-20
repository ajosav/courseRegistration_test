@extends('layouts.master')



@section('content-wrapper')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-6 mt-5">
                <h3>Select an Option</h3>
                @include('includes.form_error')
                {!! Form::open(['method'=>'POST', 'action'=>'RecommendationController@findCourses']) !!}
                    <div class="form-group">
                        {!! Form::label('semester', 'Semester:') !!}
                        {!! Form::select('semester', ['' => "--Select a Semester--"] + $session, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('level', 'Level:') !!}
                        {!! Form::select('level', ['' => "--Select a Level--"] + $level, null, ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::submit('GO', ['class'=>'btn btn-block btn-primary btn-lg']) !!}
                    </div>
                {!! Form::close() !!}
            </div>    
        </div>
    </div>


@stop