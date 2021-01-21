@extends('layouts.front')
@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="pages">
          <li>
            <a href="{{ route('front.index') }}">
              {{ $langg->lang17 }}
            </a>
          </li>
          <li>
            <a href="">
              About
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Area End -->



<section class="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="about-info">
          <h4 class="title">
            About OJARH.com
          </h4>
            <p>OJARH.COM started in 2020, it is a well designed platform for Global wholesale business, and we
              strive to have a positive impact on suppliers, buyers, the economy and communities. The owners,
              investors, partners, vendors all geared to make it a global brand, a marketplace that confronts
              almost all hiccups in global wholesale business.</p>

            <h4>MISSION STATEMENT</h4>

            <p>To serve as a Marketplace that connects manufacturers, suppliers, buyers, and service providers around the world.</p>

            <p>To facilitate wholesale business between the suppliers and the buyers, to share and use our high valued innovative systems that reduced risk of doing global business to benefit our customers.</p>

            <p>To grow small businesses to the level of sustainability.</p>
            
        </div>
      </div>
    </div>
  </div>
</section>

@endsection