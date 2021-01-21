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
              Terms & Conditions
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
            Terms & Conditions
          </h4>



          <h3>INTRODUCTION</h3>
<p>This website is owned and operated by OJARH GLOBAL INNOVATIONS for purpose of diverse
wholesale business , we reserved the right to modify every article on the terms and conditions of
use and updates when need be.</p>

<h3>TERMS AND CONDITIONS OF USE</h3>
<p>You be 18 years and above before you use this site ,if you are not, seek parental guidance to do
so, or avoid using it.</p>
<p>We grant you a non-transferable, revocable and non-exclusive license to use this site, in
accordance with the terms and conditions of use and breach of these terms and conditions, we
reserve the right to deny you access to the site website and its content and revoke the license
granted in this paragraph with prior notice to you.</p>
<p>If we determined that you are in breach of any of these conditions at our sole discretion will
deny you access to the website and delete your company contents without prejudice to any
available remedies at law or otherwise.</p>
<h3>ACCESSIBILITY OF WEBSITE</h3>
<p>Our aim is to ensure easy accessibility to our website at any time, but we reserve the right to
terminate any time and without notice if we determined any breach . you should accept
interruption due to improvement on the site ,scheduled maintenance or may be due to outside
factor beyond our control.</p>
            

        </div>
      </div>
    </div>
  </div>
</section>

@endsection