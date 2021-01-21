@extends('layouts.front')
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
								{{ $langg->lang329 }}
								<a class="mybtn1" href="{{route('user-advert-create')}}"> <i class="fas fa-plus"></i>Create Advert</a>
							</h4>
						</div>
						<div class="mr-table allproduct mt-4">
							<div class="table-responsiv">
								<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Title</th>
											<th>link</th>
											<th>Ending Data</th>
											<th>Status</th>
											<th>Image</th>
										</tr>
									</thead>
									<tbody>
										@foreach($adverts as $advert)
										<tr>
											<td>{{ $advert->id }}</td>
											<td>{{ $advert->title }}</td>
											<td>{{ $advert->link }}</td>
											<td>{{ $advert->ending_date }}</td>
											@if($advert->is_active)
												<td>Active</td>
											@else
												<td>Inactive</td>
											@endif

											<td><a href="{{ $advert->image }}" target="_blank" class="btn btn-primary">View Image</a></td>
											
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
	</div>
</section>
@endsection