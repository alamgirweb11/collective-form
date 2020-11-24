@extends('layouts.app')
@section('content')
<div class="card offset-4" style="width: 24rem;">
    <img class="card-img-top" src="{{asset("uploads/$forum->photo")}}" height="250px" width="100%" alt="Empty Image">
    <div class="card-body">
      <h5 class="card-title">{{$forum->name}}</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Mobile: {{$forum->mobile}}</li>
      <li class="list-group-item">Address: {{$forum->address}}</li>
      <li class="list-group-item">Occupation: {{$forum->occupation}}</li>
    </ul>
    <div class="card-body">
    <a href="{{route('home')}}" class="card-link">Back to home</a>
      <a href="{{route('forums.edit',$forum->id) }}" class="card-link">Update Your Info</a>
    </div>
  </div>
  @endsection