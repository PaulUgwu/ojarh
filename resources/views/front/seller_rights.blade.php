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
              Seller's Rights
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
            Seller's Rights
          </h4>

           <p>If you are concerned about your data you have the right to request access to your personal data
which we may hold or process about you ,you have the right to require us to correct any
inaccuracies in your data free of charge at any stage you also have the right to ask us to stop
using your personal data for direct marketing purposes.</p>
            

        </div>
      </div>
    </div>
  </div>
</section>

@endsection