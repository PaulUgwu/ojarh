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
            DISPLAY OF PRODUCT AND COMPANY IMAGE
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
          DISPLAY OF PRODUCT AND COMPANY IMAGE
          </h4>

            <p>The pictures of stores, factories, warehouses, workshops, exhibition pictures, employee group
              photos, best-selling products etc displayed by the sellers should be genuine and exact, it is not
              allowed to upload pictures that infringed on another company’s trademark, or for the purpose of
              deceiving the buyers. The buyers should receive the exact condition of the products you displayed.</p>

            

        </div>
      </div>
    </div>
  </div>
</section>

@endsection