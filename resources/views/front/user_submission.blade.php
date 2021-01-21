@extends('layouts.front')
@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="pages">
          <li>
            <a href="{{ route('front.index') }}">
              {{ $langg->lang17 }}
            </a>
          </li>
          <li>
            <a href="">
            USER SUBMISSION
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Area End -->



<section class="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="about-info">
          <h4 class="title">
          USER SUBMISSION
          </h4>

            <p>Anything that you submit to the site and /or provide to us, including but not limited to questions,
              reviews, comments, and suggestions will become our sole and exclusive property and shall not be
              returned to you. In addition to the rights applicable to any submission, when you post comments or
              reviews, to the site, you also grant us the right to use the name that you submit in connection with
              such review, comment or other content.</p>

            <p>You shall not use a false email address, pretend to be someone other than yourself or otherwise
              mislead us or third parties as to the origin of such any submissions we may, but shall not be
              obligated to remove or edit any submissions.</p>

            

        </div>
      </div>
    </div>
  </div>
</section>

@endsection