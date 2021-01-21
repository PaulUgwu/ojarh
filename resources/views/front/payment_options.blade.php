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
            BUYERS PAYMENT OPTIONS
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
          BUYERS PAYMENT OPTIONS
          </h4>

            
            

            

            <h4>BUYERS PAYMENT OPTIONS</h4>

            <p>Buyers have the right to choose any payment options he/ she is comfortable with which will also be
              acceptable to the seller.</p>

            <p>Buyers have the following payment options:</p>

            <h4>1. OFFLINE PAYMENT :</h4>

            <p>This is a payment system where the Buyers choose to pay directly to the Sellers account at their
              own risk.</p>

            <h4>2. PAYMENT TO OJARH GLOBAL INNOVATIONS ACCOUNT:</h4>

            <p>Here, our company will act as an intermediary between the Sellers and the Buyers.</p>

            <h4>This is how it works:</h4>

            <p>If the Seller agreed with the Buyer to pay directly to our account ,once we receive payment from the
              Buyer for the Order, we Alert the Seller instantly to Supply and ship the order. And once the Buyer
              confirm the receipt of the order and the order is in conformity with what the buyer requested, we
              deduct our basic charge and transfer the balance instantly to seller account.</p>

            <h4>Basic charges</h4>
            <ul>
              <li>100, 0000 to 500,000 (N1,500)</li>
              <li>501,000 and above (3,000)</li>
            </ul>

        </div>
      </div>
    </div>
  </div>
</section>

@endsection