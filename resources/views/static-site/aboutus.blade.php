@extends('layouts.app')

@section('content')
  <!-- Page Content -->
  <div class="container">
    <!-- Introduction Row -->
    <h1 class="my-4">About Us</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, explicabo dolores ipsam aliquam inventore
      corrupti eveniet quisquam quod totam laudantium repudiandae obcaecati ea consectetur debitis velit facere
      nisi expedita vel?</p>

    <!-- Team Members Row -->
    <div class="row">
      <div class="col-lg-12">
        <h2 class="my-4">Our Team</h2>
      </div>

      @foreach($aboutus as $about)
        <div class="col-lg-4 col-sm-6 text-center mb-5">
          <img class="rounded-circle img-fluid d-block mx-auto" src="{{ $about->portrait_link }}"
               alt="{{ $about->name }} Portrait">
          <h3 class="mt-3">{{ $about->name }} </h3>
          <h3 class="mb-4">
            <small>{{ $about->job_title }}</small>
          </h3>
          <p>{{ $about->job_summary }}</p>
        </div>
      @endforeach
    </div>
  </div>

  <tiptap-editor></tiptap-editor>
@endsection
