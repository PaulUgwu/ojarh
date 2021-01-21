@extends('layouts.vendor')

@section('content')
<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{ $langg->lang443 }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('vendor-dashboard') }}">{{ $langg->lang441 }} </a>
                    </li>
                    <li>
                        <a href="javascript:;">{{ $langg->lang442 }}</a>
                    </li>
                    <li>
                        <a href="{{ route('vendor-order-index') }}">{{ $langg->lang443 }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="mr-table allproduct">

                    <div class="table-responsiv">
                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                        <div class="col-md-10">

                            <div class="row col-md-12 text-center" style="border-bottom: 1px solid #f2f2f2;">
                                <h1 class="text-center m-auto pt-3 pb-3 "><b>Admin</b></h1>
                            </div>






                            <div id="chat_timeline">

                            </div>





                            <div class="row col-md-12 text-center " style="background-color: #fff !important; padding: 10px; text-align: center !important; color:white; border-top: solid #ccc 1px; ">
                                <div class="form-inline  col-md-8 m-auto">
                                    <input type="text" id="reply_message" class="form-control col-10" style="height: 45px; border-radius: 0px;">
                                    <input id="chat_id" type="hidden" value="{{$chat->id ?? ''}}" />
                                    <button class="btn btn-danger btn-sm col-2" style="height: 45px; border-radius: 0px;" onclick="create_reply()">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>


const base_url = "{{ url('/') }}";

jQuery(document).ready(function(e){ //when the page as completed loading start getting restaurants

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    get_chat_replies('{{$chat->id}}')

})



function create_message() {

    // disable the submit button so that user can not submite form more than once
    $("#create_coordinator_btn").attr("disabled", true);

    // clear all the error in the DOM
    $('#error_mcb_full_name').text('');
    $('#error_mcb_email').text('');
    $('#error_mcb_phone_number').text('');
    $('#error_mcb_address').text('');
    $('#error_mcb_topic').text('');
    $('#error_mcb_message').text('');

    // collect the data in the form
    var form = new FormData();
    
    form.append("customer_email", $('#email').val());
    form.append("customer_full_name", $('#full_name').val());
    form.append("customer_phone_number", $('#phone_number').val());
    form.append("manufacturer_id", 1);
    form.append("customer_address", $('#address').val());
    form.append("chat_topic", $('#topic').val());
    form.append("message", $('#message').val());

    // use jquery ajax to make request to the server
    $.ajax({
    "url": base_url + "/chat/new_chat",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Accept": "application/json",
    },
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form,
    "dataType": "JSON",
    error: function(response_errors) {

        console.log(response_errors);

        // check if the error is form data validation error
        if(response_errors.responseJSON.message === "The given data was invalid.") {
        
        // get all the form validation errors
        const errors = response_errors.responseJSON.errors;

        // loop the all the validation errors ans show then on the form
        for (var key in errors) {
            if (errors.hasOwnProperty(key)) {
                // show the error in the DOM
                $("#error_mcb_"+key).text(errors[key])
            }
        }

        }
        
    }
    })
    .done(function (response) {

        if(response == null) {
            return
        }


        $("#send_message_btn").attr("disabled", true);
        $("#new_chat_form").css("display", "none");
        $("#chat_msg").css("display", "block");
        $("#reply_box").css("display", "block");

        $("#chat_id").val(response);
        get_chat_replies(response)

        // enable the submite button
        // disable the submit button so that user can not submite form more than once
        $("#send_message_btn").attr("disabled", false);

    })
}



function create_reply() {

    console.log('here')

    // disable the submit button so that user can not submite form more than once
    // $("#create_coordinator_btn").attr("disabled", true);

    // clear all the error in the DOM
    // $('#error_mcb_message').text('');

    // collect the data in the form
    var form = new FormData();

    form.append("message", $('#reply_message').val());
    form.append("chat_id", $('#chat_id').val());

    // use jquery ajax to make request to the server
    $.ajax({
    "url": base_url + "/vendor/chat/reply",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Accept": "application/json",
    },
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form,
    "dataType": "JSON",
    error: function(response_errors) {

        console.log(response_errors);

        // check if the error is form data validation error
        if(response_errors.responseJSON.message === "The given data was invalid.") {
        
        // get all the form validation errors
        const errors = response_errors.responseJSON.errors;

        // loop the all the validation errors ans show then on the form
        for (var key in errors) {
            if (errors.hasOwnProperty(key)) {
                // show the error in the DOM
                $("#error_mcb_"+key).text(errors[key])
            }
        }

        }
        
    }
    })
    .done(function (response) {

        console.log(response)

        $('#reply_message').val('')

        $("#send_message_btn").attr("disabled", true);

        $("#new_chat_form").css("display", "none");
        $("#chat_timeline").css("display", "block");
        $("#reply_box").css("display", "block");

        // loop through the returnes response containtaining the coordinators
        for (var i = 0; i < response.length; i++) {

            let chatHTML = `<div class="direct-chat-msg doted-border">

                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">`+ response[i]['replyer'] +`</span>
                </div>

                <!-- /.direct-chat-info -->
                <img alt="message user image" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img"><!-- /.direct-chat-img -->

                <div class="direct-chat-text">
                    `+ response[i]['message'] +`
                </div>

                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-timestamp pull-right">`+ response[i]['created_at'] +`</span>
                </div>

            </div>`

            $("#chat_timeline").prepend(chatHTML);

        }

        // enable the submite button
        // disable the submit button so that user can not submite form more than once
        $("#send_message_btn").attr("disabled", false);
        
    })
}


function chat_replies(chat_id) {
    $.ajax({
    url: base_url + "/vendor/chat/replies",
    type: "POST",
    data: {chat_id: chat_id},
    error: function(response_errors) {
        console.log(response_errors);
    }
    })
    .done(function (response) {

        if(response == null) {
            return;
        }

        $("#chat_timeline").empty();
        
        // loop through the returnes response containtaining the coordinators
        for (var i = 0; i < response.length; i++) {

            let chatHTML = '';
            
            if(response[i]['admin_id']) {

                chatHTML = `<div class="row col-md-12 p-3 " style="background-color: #fff !important; padding: 20px; ">
                    <div class="col-md-4 p-3 " style="border: 1px solid #ddd; border-radius: 5px ">
                        <small>admin</small>
                        <div class="row ">
                            <div class="col-md-6 text-left ">`+ response[i]['created_at'] +`</div>
                            <div class="col-md-6 text-right ">11:23AM</div>
                        </div>
                        <p>`+ response[i]['message'] +`</p>
                    </div>
                </div>`

            } else {

                chatHTML = `<div class="row col-md-12 p-3 " style="background-color: #fff !important; padding: 20px; ">
                    <div class="col-md-4 offset-8 p-3 " style="border: 1px solid #ddd; border-radius: 5px ">
                        <small>`+ response[i]['replyer_name'] +`</small>
                        <div class="row ">
                            <div class="col-md-6 text-left ">`+ response[i]['created_at'] +`</div>
                            <div class="col-md-6 text-right ">11:23AM</div>
                        </div>
                        <p>`+ response[i]['message'] +`</p>
                    </div>
                </div>`

            }
        
            $("#chat_timeline").prepend(chatHTML);

        }
        
    });
}

function get_chat_replies(chat_id) {
    window.setInterval(function(){
        chat_replies(chat_id)
        // $("#popup_box").animate({ scrollTop: $('#chat_timeline').prop("scrollHeight")}, 1000);
    }, 3000)
}

</script>
@endsection