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
                        <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Custoer Name</th>
                                    <th>Custoer Email</th>
                                    <th>Custoer Phone Number</th>
                                    <th>Product Name</th>
                                    <th>Chat Title</th>
                                    <th>Last Message</th>
                                    <th>Chat</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($chats as $chat)
                                <tr>
                                    <th>{{ $chat->id }}</th>
                                    <th>{{ $chat->customer_full_name}}</th>
                                    <th>{{ $chat->customer_email}}</th>
                                    <th>{{ $chat->customer_phone_number }}</th>
                                    <th>{{ App\Models\Product::find($chat->product_id)->name }}</th>
                                    <th>{{ $chat->request_title }}</th>
                                    <th>{{ $chat->chat_replies->last()->message }}</th>
                                    <th><a href="{{ url('vendor/replies/' . $chat->id ) }}" class="btn btn-primary">Reply</a> </th>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection