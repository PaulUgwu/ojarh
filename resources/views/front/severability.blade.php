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
            SEVERABILITY
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
          SEVERABILITY
          </h4>
            <p>If any portion of these terms and conditions of sale is held by any court or tribunal to be invalid or
              unenforceable, either in whole or in part then that part shall be severed from these terms and
              conditions of sale and shall not affect the validity or enforceability of any other section listed in this
              document.</p>

            

        </div>
      </div>
    </div>
  </div>
</section>

@endsection