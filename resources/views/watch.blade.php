@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #9ac29d">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>{{ $lesson->title }}</h1>
        <p class="fs-20 opacity-70">{{  $series->title }}</p>

      </div>
    </div>

  </div>
</header>
@stop

@section('content')
  <div class="section bg-grey">
    <div class="container">
      @php
        $nextLesson = $lesson->getNextLesson();
        $prevLesson = $lesson->getPrevLesson();
      @endphp 
      <div class="row gap-y text-center"> 
        <div class="col-12">          
        <vue-player defualt_lesson="{{$lesson}}"
        @if ($nextLesson)
        next_lesson_url="{{route('series.watch',['series'=>$series->slug,'lesson'=>$nextLesson->id])}}"
        @endif
        >
           </vue-player>
           @if($nextLesson)
           <a href="{{route('series.watch',['series'=>$series->slug,'lesson'=>$nextLesson->id])}}" class="btn btn-info">next lesson</a>

           @endif
           @if($prevLesson)
           <a href="{{route('series.watch',['series'=>$series->slug,'lesson'=>$prevLesson->id])}}" class="btn btn-info">prev lesson</a>

           @endif            
        </div>
        <div class="col-12">
          <ul class="list-group">
           @foreach ($series->getOrderedLessons() as $l)
           <li class="list-group-item
           @if($l->id==$lesson->id)
           active
           @endif">

@if(auth()->user()->hasCompleteLesson($l))
<b><small>completed</small></b>
@endif

           <a href="{{route('series.watch',['series'=>$series->slug,'lesson'=>$l->id])}}">
              {{$l->title}}
            </a>
             
         </li>
           @endforeach
             
          
          </ul>
        </div>
      </div>
    </div>
  </div>
@stop