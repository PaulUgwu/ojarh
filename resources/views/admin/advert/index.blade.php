@extends('layouts.admin')

@section('content')
<input type="hidden" id="headerdata" value="{{ __('COUPON') }}">
<div class="content-area">
	<div class="mr-breadcrumb">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading">{{ __('Advert') }}</h4>
				<ul class="links">
					<li>
						<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
					</li>
					<li>
						<a href="{{ route('admin-coupon-index') }}">{{ __('Advert') }}</a>
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
						<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>{{ __('ID') }}</th>
									<th>{{ __('User ID') }}</th>
									<th>{{ __('User Email') }}</th>
									<th>{{ __('Ad Title') }}</th>
									<th>{{ __('Ad URL') }}</th>
									<th>{{ __('Position') }}</th>
									<th>{{ __('Ending Date') }}</th>
									<th>{{ __('Image') }}</th>
									<th>{{ __('Status') }}</th>
								</tr>
							</thead>
							<tbody>
								@foreach($adverts as $advert) 
								<tr>
									<th>{{ $advert->id }}</th>
									<th>{{ $advert->user_id }}</th>
									<th>{{ App\Models\User::find($advert->user_id)->email  }}</th>
									<th>{{ $advert->title }}</th>
									<th>{{ $advert->link }}</th>
									<th>{{ $advert->position }}</th>
									<th>{{ $advert->ending_date }}</th>
									<th><a href="{{ url('storage/adverts/' . $advert->image)  }}" target="_blank" class="btn btn-primary">View Image</a> </th>
									<th>
										@if($advert->is_active == 1)
											<a href="{{ url('/admin/advert/toggle-status/' . $advert->id)  }}" class="btn btn-primary btn-sm">Active</a>
										@else
											<a href="{{ url('/admin/advert/toggle-status/' . $advert->id)  }}" class="btn btn-warning btn-sm">Inactive</a>
										@endif
										
									 </th>
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