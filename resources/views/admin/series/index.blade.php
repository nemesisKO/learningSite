
@extends('layouts.app')


@section('header')
<header class="header header-inverse" style="background-color: #c2b2cd;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

      <h1>{{$series->title}}</h1>
        <p class="fs-20 opacity-70">customize youre series Lessons</p>

      </div>
    </div>

  </div>
</header>
@stop

@section('content')
<div class="section">
        <div class="container">

          <div class="row gap-y">
            <div class="col-12 col-md-6 col-lg-12">

            {{-- {{$series->lessons->first()->title}} --}}

            <vue-lessons defualt_lessons="{{$series->lessons}}" series_id="{{$series->id}}">
            </vue-lessons>

            </div>


           
          </div>


        </div>
      </div>
@endsection