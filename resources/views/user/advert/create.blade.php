@extends('layouts.front')

@section('styles')
<style type="text/css">


</style>


@endsection

@section('content')


<section class="user-dashbord">
    <div class="container">
        <div class="row">
            @include('includes.user-dashboard-sidebar')
            <div class="col-lg-8">
                <div class="user-profile-details">
                    <div class="order-history">
                        <div class="header-area">
                            <h4 class="title">
                                Create Advert
                                <a class="mybtn1" href="{{route('user-adverts')}}"> <i class="fas fa-arrow-left"></i> {{ $langg->lang337 }}</a>
                            </h4>
                        </div>

                        <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                        <form class="form-horizontal" action="{{route('user-advert-store')}}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="control-label col-sm-12" for="name">Title*</label>
                                <div class="col-sm-12">
                                    <input name="title" id="title" class="form-control" type="text" value="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-4" for="name">Advert Position*
                                </label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="position" id="position">
                                        <option value="">Select advert position</option>
                                        <option value="wide-big">Wide Big(1140 X 404) ₦3000</option>
                                        <option value="wide-small">Wide Small(560px X 220px) ₦1500</option>
                                        <option value="long">Long(285px X 380px) ₦1400</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-12" for="name">Image* <small>(Image size should be according to the size selected above or some part of image may be cut of when displayed)</small>

                                </label>
                                <div class="col-sm-12">
                                    <input name="image" id="image" class="form-control" type="file" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-12" for="name">Link* <small>(The URL you want users to be redirected to when they click your ads)</small>

                                </label>
                                <div class="col-sm-12">
                                    <input name="link" id="link" class="form-control" type="text" placeholder="e.g https://ojarh.ng" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-12" for="name">Description <small>(255 character max)</small></label>
                                <input type="hidden" value="" name="payment_ref" id="payment_ref" />

                                
                                <div class="col-sm-12">
                                    <textarea name="description" class="form-control" type="url" value=""></textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="add-product-footer">
                                <button name="addProduct_btn" type="button" class="mybtn1" onclick="pay_with_paystack()">Pay now</button>
                                <button name="addProduct_btn d-none" style="display: none" type="submit" id="fml-de">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://js.paystack.co/v1/inline.js"></script>


<script>
    function pay_with_paystack() {

        // validate form
        var position = $('#position').val()
        var image = $('#image').val()
        var link = $('#link').val()
        var title = $('#title').val()

        if(position == '' || image == '' || link == '' || title == ''){
            alert('Title, Position, Image and Link fields can not be empty');
            return;
        }

        var amount = 0

        if($('#position').val() == 'wide-big'){
            amount = 3000
        } else if($('#position').val() == 'wide-small'){
            amount = 1500
        } else if($('#position').val() == 'long'){
            amount = 1400
        } else {
            alert('Inverlid advert position selected');
            return;
        }

        var handler = PaystackPop.setup({
            key: '{{$gs->paystack_key}}',
            email: '{{$user->email}}',
            amount: amount * 100,
            currency: "NGN",
            ref: ''+Math.floor((Math.random() * 1000000000) + 1),
            callback: function(response){
                $('#payment_ref').val(response.reference);
                $('#fml-de').click();
            },
            onClose: function(){
            }
        });
        handler.openIframe();
    }
</script>
@endsection