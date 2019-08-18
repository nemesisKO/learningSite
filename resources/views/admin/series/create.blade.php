
@extends('layouts.app')


@section('header')
<header class="header header-inverse" style="background-color: #c2b2cd;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Create a bahd series</h1>
      

      </div>
    </div>

  </div>
</header>
@stop

@section('content')
<div class="section">
        <div class="container">

          <div class="row gap-y">
            <div class="col-12 col-md-6">

              <form action="{{route('series.store')}}" method="POST" enctype="multipart/form-data">
               
{{ csrf_field() }}
                <div class="form-group">
                  <input class="form-control form-control-lg" type="text" name="title" placeholder="Your Series title">
                  @if ($errors->has('title'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
                </div>

                <div class="form-group">
                  <input class="form-control form-control-lg" type="file" name="image" >
                  @if ($errors->has('image'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('image') }}</strong>
                  </span>
              @endif
                </div>

                <div class="form-group">
                  <textarea class="form-control form-control-lg" name="description" rows="4" placeholder="description"></textarea>
                </div>


                <button class="btn btn-lg btn-primary btn-block" type="submit">create</button>
              </form>

            </div>


            <div class="col-12 col-md-5 offset-md-1">
              <div class="bg-grey h-full p-20">
                <p>Give us a call or stop by our door anytime, we try to answer all enquiries within 24 hours on business days.</p>
                <p>We are open from 9am — 5pm week days.</p>

                <hr class="w-80">

                <p class="lead">652 Main Road, Apt 12<br>New York, USA 10033</p>

                <div>
                  <span class="d-inline-block w-20 text-lighter" title="Email">E:</span>
                  <span class="fs-14">info@domain.com</span>
                </div>

                <div>
                  <span class="d-inline-block w-20 text-lighter" title="Phone">P:</span>
                  <span class="fs-14">+1 (123) 456-7890</span>
                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
@endsection