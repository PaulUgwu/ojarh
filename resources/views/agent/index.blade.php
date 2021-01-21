@extends('layouts.agent') 

@section('content')
                    <div class="content-area">

                            @if($user->checkWarning())

                                <div class="alert alert-danger validation text-center">
                                        <h3>{{ $user->displayWarning() }} </h3> <a href="{{ route('vendor-warning',$user->verifies()->where('admin_warning','=','1')->orderBy('id','desc')->first()->id) }}"> {{$langg->lang803}} </a>
                                </div>

                            @endif

                        
                        @include('includes.form-success')
                        <div class="row row-cards-one">

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg2">
                                        <div class="left">
                                            <h5 class="title">My AGent ID</h5>
                                            <span class="number">{{ $user->id }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg1">
                                        <div class="left">
                                            <h5 class="title">Sellers</h5>
                                            <span class="number">{{ $users->count() }}</span>
                                            <a href="{{route('agent-sellers')}}" class="link">{{ $langg->lang471 }}</a>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg3">
                                        <div class="left">
                                            <h5 class="title">Agent Balance</h5>
                                            <span class="number">N{{ $user->agent_balance }}</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                    </div>

@endsection
