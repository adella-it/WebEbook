@extends('layouts.apps')
@section('users')
<div class="hero_area">

    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h5>
                      Amazing E-Book Bookstore
                    </h5>
                    <h1>
                      {{ __('Find and Rent Your E-Book Here!') }}
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ asset('./assets/images/slider-img.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h5>
                      Amazing E-Book Bookstore
                    </h5>
                    <h1>
                      {{ __('Find and Rent Your E-Book Here!') }}
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ asset('./assets/images/slider-img.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h5>
                      Amazing E-Book Bookstore
                    </h5>
                    <h1>
                      {{ __('Find and Rent Your E-Book Here!') }}
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ asset('./assets/images/slider-img.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn_box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>





  <!-- blog section -->

  <section class="blog_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          {{ __('Rent Book') }}
        </h2>
      </div>
      <div class="row">
        @foreach($ebook as $ebooks)
        <div class="col-md-3">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/b1.jpg') }}" alt="">
              <h4 class="blog_date">
                <span>
                  {{ $ebooks->author }}
                </span>
              </h4>
            </div>
            <div class="detail-box">
              <h5>
                {{ $ebooks->title }}
              </h5>
              <p>
                {{ $ebooks->description }}
              </p>
                  <a href="{{ route('order.detail', $ebooks->ebook_id) }}" class=" text-white btn btn-sm btn-primary">{{ __('Detail') }}</a>

            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>

  <!-- end blog section -->




@endsection
