@extends('layouts.front')
@section('content')



<!-- Vendor Area Start -->
  <div class="vendor-banner" style="background: url({{  $vendor->shop_image != null ? asset('assets/images/vendorbanner/'.$vendor->shop_image) : '' }}); background-repeat: no-repeat; background-size: cover;background-position: center;{!! $vendor->shop_image != null ? '' : 'background-color:'.$gs->vendor_color !!} ">
    <div class="container">
      <div class="row">
        <div class="col-lg-s12">
          <div class="content">
            <p class="sub-title">
                {{ $langg->lang226 }}
            </p>
            <h2 class="title">
              {{ $vendor->shop_name }}
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>


{{-- Info Area Start --}}
<section class="info-area">
  <div class="container">


        @foreach($services->chunk(4) as $chunk)

        <div class="row">

        <div class="col-lg-12 p-0">
          <div class="info-big-box">
              <div class="row">
                @foreach($chunk as $service)
              <div class="col-6 col-xl-3 p-0">
                <div class="info-box">
                  <div class="icon">
                    <img src="{{ asset('assets/images/services/'.$service->photo) }}">
                  </div>
                  <div class="info">
                      <div class="details">
                        <h4 class="title">{{ $service->title }}</h4>
                      <p class="text">
                        {!! $service->details !!}
                      </p>
                      </div>
                  </div>
                </div>
              </div>
              @endforeach
              </div>
          </div>
        </div>

        </div>

          @endforeach


        </div>
</section>
{{-- Info Area End  --}}




<!-- SubCategori Area Start -->
  <section class="sub-categori">
    <div class="container">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link text-danger active" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="true">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" id="image-gallery-tab" data-toggle="tab" href="#image-gallery" role="tab" aria-controls="image-gallery" aria-selected="false">Image Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" id="video-gallery-tab" data-toggle="tab" href="#video-gallery" role="tab" aria-controls="video-gallery" aria-selected="false">Video Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" id="business-details-tab" data-toggle="tab" href="#business-details" role="tab" aria-controls="business-details" aria-selected="false">Business Details</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
        <div class="row mt-3">

          @include('includes.vendor-catalog')


          <div class="col-lg-9 order-first order-lg-last mt-5">
            <div class="right-area">

              @if(count($vprods) > 0)


              <div class="categori-item-area">
                {{-- <div id="ajaxContent"> --}}
                  <div class="row">

                    @foreach($vprods as $prod)
                      @include('includes.product.product')
                    @endforeach

                  </div>
                    <div class="page-center category">
                      {!! $vprods->appends(['sort' => request()->input('sort'), 'min' => request()->input('min'), 'max' => request()->input('max')])->links() !!}
                    </div>
                {{-- </div> --}}
              </div>

              @else
                <div class="page-center">
                  <h4 class="text-center">{{ $langg->lang60 }}</h4>
                </div>
              @endif


            </div>
          </div>
        </div>
      </div>
      
      <div class="tab-pane fade" id="image-gallery" role="tabpanel" aria-labelledby="image-gallery-tab">
        <div class="row mt-3">
        @if(App\ImageGallery::where('user_id', $vendor->id)->get()->count())
          @foreach (App\ImageGallery::where('user_id', $vendor->id)->get() as $image)
          <div class="col-md-3 mb-3">
            <div class="card">
              <img src="{{ asset('storage/gallery/' . $image->url) }}" height="250" class="card-img-top" alt="{{ $image->title }}">
              <div class="card-body">
                <h5 class="card-title">{{ $image->title }}</h5>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <h4>No image in gallery</h4>
        @endif
        </div>
      </div>

      <div class="tab-pane fade" id="video-gallery" role="tabpanel" aria-labelledby="video-gallery-tab">
        <div class="row mt-3">
        @if(App\VideoGallery::where('user_id', $vendor->id)->get()->count())
          @foreach (App\VideoGallery::where('user_id', $vendor->id)->get() as $video)

          <?php
            $you_string = '';
            $parts = parse_url($video->url);
            if(isset($parts['query'])){
              $you_string = substr($parts['query'], 2, strlen($parts['query']));
            } elseif (isset($parts['path'])){
              $you_string = substr($parts['path'], 1, strlen($parts['path']));
            }
          ?>

          <div class="col-md-6 mb-3">
            <div class="card">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $you_string }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <div class="card-body">
                <h5 class="card-title">{{ $video->title }}</h5>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <h4>No video in gallery</h4>
        @endif
        </div>
      </div>

      <div class="tab-pane fade" id="business-details" role="tabpanel" aria-labelledby="business-details-tab">
        <div class="row mt-3 align-content-center">



          <div class="col-12">
          </div>
          <div class="col-md-7">
            <div class="row jumbotron" style="background-image: url({{ asset('/assets/card-bg.png') }}); background-size: cover;">
              <div class="col-5">
                <img src="{{ $vendor->photo ? asset('assets/images/users/'.$vendor->photo):asset('assets/images/noimage.png') }}" 
                alt="">
              </div>
              <div class="col-7">
                <p class="lead text-white">{{ $vendor->name }}</p>
                <p class="text-white">Owner Name: {{ $vendor->owner_name }}</p>
                <p class="text-white">Phone Number: {{ $vendor->phone }}</p>
                <p class="text-white">Email: {{ $vendor->email }}</p>
                <p class="text-white">Country: {{ $vendor->country }}</p>
                <p class="text-white">Address: {{ $vendor->address }}</p>
              </div>
              
            </div>
          </div>


          <div class="col-12">










          <div class="front-side">
              <div class="color-grid">
                  <div class="black"></div>
                  <div class="red1"></div>
                  <div class="red2"></div>
                  <div class="green"></div>
              </div>
              <div class="info-grid">
                  <div class="name">
                      <h2>YOUR NAME</h2>
                      <h5>CREATIVE GRAPHIC DESIGNER</h5>
                  </div>
                  <div class="addr">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px"
                          viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="30px" height="30px">
                          <g>
                              <g>
                                  <path d="M455.139,498.052l-99.132-99.132c-1.532-1.532-3.61-2.392-5.777-2.392h-18.927c-4.512,0-8.17,3.657-8.17,8.17    s3.658,8.17,8.17,8.17h15.542l82.792,82.791H82.362l82.791-82.791h15.542c4.512,0,8.17-3.657,8.17-8.17s-3.658-8.17-8.17-8.17    H161.77c-2.167,0-4.245,0.861-5.777,2.392l-99.132,99.132c-2.337,2.338-3.036,5.851-1.771,8.904    c1.265,3.053,4.244,5.044,7.548,5.044h386.723c3.304,0,6.283-1.99,7.548-5.044C458.175,503.903,457.475,500.39,455.139,498.052z"
                                      fill="#FFFFFF" />
                              </g>
                          </g>
                          <g>
                              <g>
                                  <path d="M256,0C161.393,0,84.426,76.968,84.426,171.574c0,35.596,10.808,69.742,31.263,98.756l133.641,188.964    c1.532,2.165,4.019,3.452,6.671,3.452c2.653,0,5.14-1.288,6.671-3.452L396.32,270.32c20.448-29.004,31.256-63.15,31.256-98.746    C427.574,76.968,350.607,0,256,0z M382.971,260.895L256,440.427L129.037,260.905c-18.495-26.234-28.271-57.125-28.271-89.331    C100.766,85.978,170.403,16.34,256,16.34s155.234,69.637,155.234,155.234C411.234,203.78,401.458,234.671,382.971,260.895z"
                                      fill="#FFFFFF" />
                              </g>
                          </g>
                          <g>
                              <g>
                                  <path d="M256,92.596c-43.549,0-78.979,35.429-78.979,78.979c0,14.657,4.073,28.988,11.779,41.442    c2.375,3.836,7.41,5.022,11.247,2.649c3.837-2.375,5.023-7.41,2.649-11.247c-6.107-9.87-9.335-21.225-9.335-32.843    c0-34.539,28.099-62.638,62.638-62.638s62.638,28.099,62.638,62.638S290.539,234.213,256,234.213    c-11.617,0-22.974-3.228-32.843-9.335c-3.839-2.376-8.873-1.187-11.247,2.649s-1.189,8.873,2.649,11.247    c12.454,7.706,26.784,11.779,41.44,11.779c43.549,0,78.979-35.429,78.979-78.979C334.979,128.025,299.549,92.596,256,92.596z"
                                      fill="#FFFFFF" />
                              </g>
                          </g>
                      </svg>
                      <p>1/2 Street,
                          <strong> City</strong>, State,
                          <strong> Country</strong>
                      </p>
                  </div>
                  <div class="phoneNo">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 472.811 472.811"
                          enable-background="new 0 0 472.811 472.811" width="30px" height="30px">
                          <g>
                              <path d="M358.75,0H114.061C97.555,0,84.128,13.428,84.128,29.934v412.944c0,16.505,13.428,29.934,29.934,29.934H358.75   c16.506,0,29.934-13.428,29.934-29.934V29.934C388.683,13.428,375.256,0,358.75,0z M99.128,75.236h274.556v312.687H99.128V75.236z    M114.061,15H358.75c8.234,0,14.934,6.699,14.934,14.934v35.302H99.128V29.934C99.128,21.699,105.827,15,114.061,15z    M358.75,457.811H114.061c-8.234,0-14.934-6.699-14.934-14.934v-44.955h274.556v44.955   C373.683,451.112,366.984,457.811,358.75,457.811z"
                                  fill="#FFFFFF" />
                              <path d="m236.406,404.552c-13.545,0-24.564,11.02-24.564,24.565s11.02,24.564 24.564,24.564 24.564-11.02 24.564-24.564-11.019-24.565-24.564-24.565zm0,39.129c-8.031,0-14.564-6.534-14.564-14.564 0-8.031 6.533-14.565 14.564-14.565s14.564,6.534 14.564,14.565c0,8.03-6.533,14.564-14.564,14.564z"
                                  fill="#FFFFFF" />
                              <path d="m202.406,47.645h68c2.762,0 5-2.239 5-5s-2.238-5-5-5h-68c-2.762,0-5,2.239-5,5s2.238,5 5,5z" fill="#FFFFFF" />
                              <path d="m184.409,47.645c1.31,0 2.6-0.53 3.53-1.46 0.93-0.94 1.47-2.22 1.47-3.54s-0.54-2.6-1.47-3.54c-0.931-0.93-2.221-1.46-3.53-1.46-1.32,0-2.601,0.53-3.54,1.46-0.93,0.93-1.46,2.22-1.46,3.54s0.53,2.6 1.46,3.54c0.93,0.93 2.22,1.46 3.54,1.46z"
                                  fill="#FFFFFF" />
                          </g>
                      </svg>
                      <p>+000
                          <strong>1234</strong> 4567 7896</p>
                  </div>
                  <div class="emailId">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 467.211 467.211"
                          enable-background="new 0 0 467.211 467.211" width="30px" height="30px">
                          <g>
                              <path d="m413.917,96.775h-360.622c-6.369,0-11.551,5.181-11.551,11.55v213.182c0,6.369 5.182,11.55 11.551,11.55h360.622c6.368,0 11.55-5.181 11.55-11.55v-213.181c-5.68434e-14-6.369-5.182-11.551-11.55-11.551zm1.55,224.732c0,0.855-0.695,1.55-1.55,1.55h-360.622c-0.855,0-1.551-0.696-1.551-1.55v-213.181c0-0.855 0.695-1.55 1.551-1.55h360.622c0.854,0 1.55,0.696 1.55,1.55v213.181z"
                                  fill="#FFFFFF" />
                              <path d="m459.711,340.558h-11.744v-237.715c0-15.752-12.815-28.568-28.568-28.568h-371.586c-15.753,0-28.568,12.815-28.568,28.568v237.714h-11.745c-4.143,0-7.5,3.358-7.5,7.5v20.605c0,13.384 10.889,24.272 24.272,24.272h418.666c13.384,0 24.272-10.889 24.272-24.272v-20.605c0.001-4.141-3.356-7.499-7.499-7.499zm-425.467-237.715c-2.84217e-14-7.481 6.087-13.568 13.568-13.568h371.586c7.481,0 13.568,6.086 13.568,13.568v237.714h-398.722v-237.714zm177.361,252.715h44v3.922c0,1.755-1.428,3.184-3.184,3.184h-37.633c-1.756,0-3.184-1.428-3.184-3.184v-3.922zm240.607,13.105c0,5.113-4.159,9.272-9.272,9.272h-418.667c-5.113,0-9.272-4.16-9.272-9.272v-13.105h11.744 174.861v3.922c0,7.27 5.914,13.184 13.184,13.184h37.633c7.27,0 13.184-5.914 13.184-13.184v-3.922h174.861 11.744v13.105z"
                                  fill="#FFFFFF" />
                          </g>
                      </svg>
                      <p class="email">yourusername@
                          <strong>email</strong>.com</p>
                      <p class="web">
                          <strong>www</strong>.yourwebsite.
                          <strong>com</strong>
                      </p>
                  </div>
              </div>
          </div>
          <div class="back-side">
              <div class="color-grid">
                  <div class="black"></div>
                  <div class="red1"></div>
                  <div class="red2"></div>
                  <div class="green"></div>
              </div>
              <div class="name-tag">
                  <h1>
                      <strong>YOUR NAME</strong>
                  </h1>
                  <h3>CREATIVE GRAPHIC DESIGNER</h3>
              </div>
          </div>
          <div class="credits">
              <div>Design Inspiration:
                  <a href="https://www.behance.net/gallery/27133319/Material-Business-Card-Template-(Freebie)">Material-Business-Card By Jongli Sojal</a>
              </div>
      <!--         <div>Icons made by
                  <a href="http://www.freepik.com" title="Freepik" target="_blank">Freepik</a> from
                  <a href="https://www.flaticon.com/" title="Flaticon" target="_blank" >www.flaticon.com</a> is licensed by
                  <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
              </div> -->
          </div> 

          
          </div>
        </div>
      </div>
    </div>

      
    </div>
  </section>
<!-- SubCategori Area End -->


@if(Auth::guard('web')->check())

{{-- MESSAGE VENDOR MODAL --}}

<div class="message-modal">
  <div class="modal" id="vendorform1" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="vendorformLabel1">{{ $langg->lang118 }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-12">
              <div class="contact-form">

                <form id="emailreply">
                  {{csrf_field()}}
                  <ul>

                    <li>
                      <input type="text" class="input-field" readonly="" placeholder="Send To {{ $vendor->shop_name }}" readonly="">
                    </li>

                    <li>
                      <input type="text" class="input-field" id="subj" name="subject" placeholder="{{ $langg->lang119}}" required="">
                    </li>

                    <li>
                      <textarea class="input-field textarea" name="message" id="msg" placeholder="{{ $langg->lang120 }}" required=""></textarea>
                    </li>

                    <input type="hidden" name="email" value="{{ Auth::guard('web')->user()->email }}">
                    <input type="hidden" name="name" value="{{ Auth::guard('web')->user()->name }}">
                    <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">
                    <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">

                  </ul>
                  <button class="submit-btn" id="emlsub1" type="submit">{{ $langg->lang118 }}</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

{{-- MESSAGE VENDOR MODAL ENDS --}}


@endif

@endsection

@section('scripts')

<script type="text/javascript">
        $("#sortby").on('change',function () {
          var sort = $("#sortby").val();
          window.location = "{{url('/store')}}/{{ str_replace(' ', '-', $vendor->shop_name) }}?sort="+sort;
        });

  $(function () {
    $("#slider-range").slider({
    range: true,
    orientation: "horizontal",
    min: 0,
    max: 10000000,
    values: [{{ isset($_GET['min']) ? $_GET['min'] : '0' }}, {{ isset($_GET['max']) ? $_GET['max'] : '10000000' }}],
    step: 5,

    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }

      $("#min_price").val(ui.values[0]);
      $("#max_price").val(ui.values[1]);
    }
    });

    $("#min_price").val($("#slider-range").slider("values", 0));
    $("#max_price").val($("#slider-range").slider("values", 1));

  });
</script>

<script type="text/javascript">
          $(document).on("submit", "#emailreply" , function(){
          var token = $(this).find('input[name=_token]').val();
          var subject = $(this).find('input[name=subject]').val();
          var message =  $(this).find('textarea[name=message]').val();
          var email = $(this).find('input[name=email]').val();
          var name = $(this).find('input[name=name]').val();
          var user_id = $(this).find('input[name=user_id]').val();
          var vendor_id = $(this).find('input[name=vendor_id]').val();
          $('#subj').prop('disabled', true);
          $('#msg').prop('disabled', true);
          $('#emlsub').prop('disabled', true);
     $.ajax({
            type: 'post',
            url: "{{URL::to('/vendor/contact')}}",
            data: {
                '_token': token,
                'subject'   : subject,
                'message'  : message,
                'email'   : email,
                'name'  : name,
                'user_id'   : user_id,
                'vendor_id'  : vendor_id
                  },
            success: function() {
          $('#subj').prop('disabled', false);
          $('#msg').prop('disabled', false);
          $('#subj').val('');
          $('#msg').val('');
        $('#emlsub').prop('disabled', false);
        toastr.success("{{ $langg->message_sent }}");
        $('.ti-close').click();
            }
        });
          return false;
        });
</script>


@endsection
