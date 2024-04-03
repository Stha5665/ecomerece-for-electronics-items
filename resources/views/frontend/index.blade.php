@extends('layouts.app')

@section('title', 'Home page')
@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">

    @foreach($sliders as $key => $slider)
    <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
      <div class="img-block">
        @if($slider->image)
        <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
        @endif
      </div>
      
        <div class="carousel-caption d-none d-md-block">
            <div class="custom-carousel-content">
                <h1>{!! $slider->title!!}</h1>
                <p>{!!$slider->description!!}  </p>
                <div>
                  <a href="#" class="btn btn-slider">
                    Get Now
                  </a>
                </div>
              </div>
          </div>
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endsection
