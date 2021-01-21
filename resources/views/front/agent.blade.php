@extends('layouts.front')
@section('content')

<div class="" style="background-color: #143250; padding: 20px; color: white;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <h3 class="title text-white">
              List of our agents
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- SubCategori Area Start -->
<section class="sub-categori">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 order-first order-lg-last">
        <div class="right-area">

          @if($users)

          <div class="categori-item-area">
            <div class="row">

            <h1></h1>

              @foreach($users as $prod)

              
                <div class="col-lg-3 col-md-3 col-4 remove-padding">
                  <a href="#" class="item">
                    <div class="item-img">
                      @if(!empty($prod->features))
                      <div class="sell-area">
                        @foreach($prod->features as $key => $data1)
                        <span class="sale" style="background-color:{{ $prod->colors[$key] }}">{{ $prod->features[$key] }}</span>
                        @endforeach
                      </div>
                      @endif
                      <div class="extra-list">
                      </div>
                      <img class="img-fluid" src="{{ $prod->photo ? asset('assets/images/users/'.$prod->photo):asset('assets/images/noimage.png') }}" 
                      alt="">
                    </div>
                    <div class="info">
                      
                      <h4 class="price">{{ $prod->agent_name }}</h4>
                      <h5 class="" style="">{{ $prod->email }}</h5>
                      <h5 class="" style="">Country: {{ $prod->country }}</h5>
                      <h5 class="">Agent Code: {{ $prod->id }}</h5>
                    </div>
                  </a>
                </div>
              @endforeach

            </div>
            <div class="page-center category">
            {{$users}}
            </div>
            {{-- </div> --}}
          </div>

          @else
          <div class="page-center">
            <h4 class="text-center">No Agent Found</h4>
          </div>
          @endif


        </div>
      </div>
    </div>
  </div>
</section>
<!-- SubCategori Area End -->




@endsection