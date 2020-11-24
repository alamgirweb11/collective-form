@extends('layouts.app')

@section('content')
<div class="card offset-4 mt-4" style="width: 40rem">
    <div class="card-header">Forum Registration Form</div>
    <div class="card-body">
       {!!Form::open(array('route'=>'forums.store','files'=>true))!!}
            <div class="row form-group">
                <div class="col-md-3">{{ Form::label('name', 'Name') }}</div>
                <div class="col-md-9"> {{ Form::text('name', '', array('class' => 'form-control', 'required')) }}</div>
            </div>
        
            <div class="row form-group">
                <div class="col-md-3">{{ Form::label('mobile', 'Mobile') }}</div>
                <div class="col-md-9"> {{ Form::text('mobile', '', array('class' => 'form-control')) }}</div>
            </div>
        
            <div class="row form-group">
                <div class="col-md-3">{{ Form::label('address', 'Address') }}</div>
                <div class="col-md-9"> {{ Form::text('address', '', array('class' => 'form-control')) }}</div>
            </div>
        
            <div class="row form-group">
                <div class="col-md-3">{{ Form::label('occupation', 'Occupation') }}</div>
                <div class="col-md-9"> {{ Form::select('occupation', array(
                    'Web Developer'=>'Web Developer',
                    'Web Designer'=>'Web Designer',
                    'Computer Operator'=>'Computer Operator',
                    'QA Tester'=>'QA Tester',
                    'Graphic Designer'=>'Graphic Designer',
                    'Software Engineer'=>'Software Engineer'
                ), '', array('class' => 'form-control')) }}</div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">{{ Form::label('photo', 'Image') }}</div>
                <div class="col-md-9"> {{ Form::file('photo', array('class' => 'form-control')) }}</div>
            </div>
            <div class="row form-group">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    {{ Form::reset('Clear', array('class'=> 'btn btn-warning mr-2')) }}
                    {{ Form::submit('Add', array('class' => 'btn btn-primary ml-4')) }}</div>
            </div>
         {!! Form::close() !!}
    </div>
</div>
@endsection