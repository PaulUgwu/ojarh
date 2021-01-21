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
            RULES FOR FILLING COMPANY INFORMATION
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
          RULES FOR FILLING COMPANY INFORMATION
          </h4>

            
            
            <p>Sellers and service providers should be genuine, honest and accurate in information in filling
              company name, physical address, business type, location areas, product descriptions and details,
              quality and performance descriptions, supply, production capacity, employees strength, profile,
              picture of stores, warehouses, factory, supply timeline, service descriptions, must be consistent with
              situation in a way it will not be confusing to the buyers.</p>

            
        </div>
      </div>
    </div>
  </div>
</section>

@endsection