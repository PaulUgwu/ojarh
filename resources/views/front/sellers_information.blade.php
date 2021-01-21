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
            SELLERS INFORMATION FOR SETTING UP STORE
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
          SELLERS INFORMATION FOR SETTING UP STORE
          </h4>

            

            
            

            

            <ol>
              <li>company name,logo, physical address,email address,phone number</li>
              <li>Profile and Overviews</li>
              <li>high quality picture of the products</li>
              <li>Product details</li>
              <li>Genuine descriptions of the products in respect to quality, country of origin, performance,
                durability,expiration, functions,sizes, colors,etc, in a way that will not be confusing to the buyers</li>
              <li>product sizes, packing sizes, and quantity in a carton, unit price, colours.</li>
              <li>product catalogue</li>
              <li>pictures of stores, factory, employees as a team</li>
              <li>video clips about the company, products etc</li>
              <li>specify if you are importer or wholesale distributor</li>
              <li>specify product brands registered and owned by your company if any</li>
              <li>sellers return policy</li>
              <li>sellers acceptable payment options</li>
              <li>sellers packaging and delivery options</li>
              <li>sellers promotions and events</li>
              <li>sellers information or instructions to the buyer</li>
              <li>opening and closing hours weekly</li>
              <li>other unique services you offer to customers to earn their businesses</li>
              <li>sellers production capacity or supply capacity</li>
              <li>sellers acceptable minimum order quantity from the buyers</li>
              <li>sellers clearly and honestly state feasible timeline for supply, packaging and shipping after order
                paid by the buyer</li>
            </ol>

        </div>
      </div>
    </div>
  </div>
</section>

@endsection