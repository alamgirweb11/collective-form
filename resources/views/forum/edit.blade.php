@extends('layouts.app')
@section('content')
<div class="card offset-4 mt-4" style="width: 40rem">
    <div class="card-header">Forum Registration Form</div>
    <div class="card-body">
       {!!Form::open(array('route'=>['forums.update',$forum->id],'files'=>true, 'method'=>'PUT'))!!}
            <div class="row form-group">
                <div class="col-md-3">{{ Form::label('name', 'Name') }}</div>
                <div class="col-md-9"> {{ Form::text('name', $forum->name, array('class' => 'form-control', 'required')) }}</div>
            </div>
        
            <div class="row form-group">
                <div class="col-md-3">{{ Form::label('mobile', 'Mobile') }}</div>
                <div class="col-md-9"> {{ Form::text('mobile', $forum->mobile, array('class' => 'form-control')) }}</div>
            </div>
        
            <div class="row form-group">
                <div class="col-md-3">{{ Form::label('address', 'Address') }}</div>
                <div class="col-md-9"> {{ Form::text('address', $forum->address, array('class' => 'form-control')) }}</div>
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
                ), $forum->occupation, array('class' => 'form-control')) }}</div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">{{ Form::label('photo', 'Image') }}</div>
                <div class="col-md-9"> {{ Form::file('photo', array('class'=>'form-control')) }}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3"><img src='{{url("uploads/$forum->photo")}}' alt="" width="50px" height="70px"></div>
                <div class="col-md-9">
                    {{ Form::reset('Restore', array('class'=> 'btn btn-warning')) }}
                    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}</div>
            </div>
         {!! Form::close() !!}
    </div>
</div>
@endsection