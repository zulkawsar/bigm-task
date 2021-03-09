@extends('web.common.master')

@section('content')
<!-- Header-->
<header class="intro intro-fullscreen" data-background="{{asset('web/img/errors/505.jpg')}}">
  <div class="intro-body">
    <h1>404</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h4 class="no-pad">INTERNAL SERVER ERROR</h4>
          <p>Please try again later.</p>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection