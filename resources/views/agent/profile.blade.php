@extends('layouts.agent')
@section('content')

						<div class="content-area">
							<div class="mr-breadcrumb">
								<div class="row">
									<div class="col-lg-12">
											<h4 class="heading">{{ $langg->lang434 }}</h4>
											<ul class="links">
												<li>
													<a href="{{ route('agent-dashboard') }}">{{ $langg->lang441 }} </a>
												</li>
												<li>
													<a href="{{ route('agent-profile') }}">{{ $langg->lang434 }} </a>
												</li>
											</ul>
									</div>
								</div>
							</div>
							<div class="add-product-content">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">

				                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
											<form id="geniusform" action="{{ route('agent-profile-update') }}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}

                      						 @include('includes.vendor.form-both')  

												

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">Agent Name *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="agent_name" placeholder="Agent Name" required="" value="{{$data->agent_name}}">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">Agent Address *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="agent_address" placeholder="Agent Address" required="" value="{{$data->agent_address}}">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">Agent Phone Number *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="agent_phone_number" placeholder="Agent Phome Number" required="" value="{{$data->agent_phone_number}}">
													</div>
												</div>

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                              
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <button class="addProductSubmit-btn" type="submit">{{ $langg->lang464 }}</button>
						                          </div>
						                        </div>

											</form>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

@endsection