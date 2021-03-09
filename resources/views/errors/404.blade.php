@extends('web.common.master')

@section('content')
<!-- Header-->
<header class="intro intro-fullscreen" data-background="{{asset('web/img/errors/404.jpg')}}">
  <div class="intro-body">
    <h1>404</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h4 class="no-pad">Oh no! This page doesn't exist</h4>
          <p>It's looking like you may have taken a wrong turn</p>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection