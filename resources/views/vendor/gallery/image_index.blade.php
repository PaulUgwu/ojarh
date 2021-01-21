@extends('layouts.vendor')

@section('content')
<input type="hidden" id="headerdata" value="PRODUCT">
<div class="content-area">
	<div class="mr-breadcrumb">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading">All Image Gallery</h4>
				<ul class="links">
					<li>
						<a href="{{ route('vendor-dashboard') }}">{{ $langg->lang441 }} </a>
					</li>
					<li>
						<a href="javascript:;">Gallery </a>
					</li>
					<li>
						<a href="javascript:;">Image Gallery</a>
					</li>

					<button class="add-btn" data-toggle="modal" data-target="#addImage">Add Image</button>


					<!-- Add Image Modal -->
					<!-- Modal -->
					<div class="modal fade" id="addImage" tabindex="-1" aria-labelledby="addImageLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="addImageLabel">New Image</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form enctype='multipart/form-data' method="POST" action="{{ route('vendor-gallery-image-store') }}">
								{{ csrf_field() }}

									<div class="row">
										<div class="col-12">
											<label>Title* </label>
										</div>
										<div class="col-12">
											<input type="text" class="form-control" name="title">
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<label>Image* <small>(Max of 2mb)</small> </label>
										</div>
										<div class="col-12">
											<input type="file" class="form-control" name="url">
										</div>
									</div>

									<div class="row mt-3">
										<div class="col-12">
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</div>

								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								
							</div>
							</div>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</div>
	<div class="product-area">
		<div class="row">
			<div class="col-lg-12">
				<div class="mr-table allproduct">

					@if(session()->has('message') && session()->get('type') == 'success')
						<div class="alert alert-success">
							{{ session()->get('message') }}
						</div>
					@elseif(session()->has('message') && session()->get('type') == 'fail')
						<div class="alert alert-danger">
							{{ session()->get('message') }}
						</div>
					@endif
					

					<div class="table-responsiv">
						<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>View</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								@foreach($images as $image)
									<tr>
										<td>{{ $image->id }}</td>
										<td>{{ $image->title }}</td>
										<td><a target="_blank" href="{{ asset('storage/gallery/' . $image->url ) }}" class="btn btn-success btn-sm">View</a> </td>
										<td><a class="btn btn-primary btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" data-title="{{ $image->title }}" data-id="{{ $image->id }}">Edit</a></td>
										<td><a class="btn btn-danger btn-sm" href="{{ url('/vendor/gallery/image/delete/' . $image->id ) }}">Delete</a></td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form enctype='multipart/form-data' method="POST" action="{{ route('vendor-gallery-image-edit') }}">
		{{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title*:</label>
            <input type="text" class="form-control" name="title" id="image_title">
		  </div>
		  <input type="hidden" id="image_id" name="id">
		  
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image: <small>(optional, 2mb max)</small></label>
            <input type="file" class="form-control" name="url" id="image_url">
		  </div>

		  <button type="submit" class="btn btn-primary">Save</button>
		  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

</div>




@endsection



@section('scripts')


<script>

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var title = button.data('title') 
  var id = button.data('id')

  var modal = $(this)
  $('#image_title').val(title)
  $('#image_id').val(id)
})

</script>

<script type="text/javascript">
	$('#geniustable').DataTable();
</script>
@endsection