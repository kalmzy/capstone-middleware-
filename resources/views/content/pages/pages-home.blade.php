@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('vendor-style')
@endsection

@section('vendor-script')
<script src="assets/vendor/libs/sortablejs/sortable.js" ></script>/>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-logistics-dashboard.js')}}"></script>
<script src="../../assets/js/main.js"></script>

@endsection
@section('title', 'Home')

@section('content')


  <!-- First Card Section -->
  <div class="col-md-12 mb-4">
    <div class="card bg-transparent shadow-none border-0">
      <div class="card-body row p-0 pb-2">
          <h2>Welcome To Dashboard </h2>
          <div class="col-12 col-lg-7">
            <p> Click on 'Demand 
              Forecasting' or 'Quality Control' to explore further and harness 
              the full potential of your data-driven strategies. Let's embark on 
              this journey together towards efficiency and excellence."</p>
          </div>
          <div class="mt-4">
          <div class="d-flex justify-content flex-wrap gap-5 me-3">
            <div class="d-flex align-items-center gap-2 me-3 me-sm-0">
            <a href="{{ route('pages-page-2') }}" class="card-link d-flex align-items-center">
              <span class="bg-label-primary p-1 rounded">
              <i class="ti ti-chart-area-line-filled"></i>
              </span>
            </a>
              <div class="content-right">
                <p class="mb-0">Demand Forecasting</p>
                <h5 class="text-primary mb-0">Click me!</h5>
              </div>
            </div>
            <div class="d-flex align-items-center gap-2">
            <a href="{{ route('pages-page-3') }}" class="card-link d-flex align-items-center">
              <span class="bg-label-info p-1 rounded">
              <i class="ti ti-device-desktop-analytics"></i>
              </span>
            </a>
              <div class="content-right">
                <p class="mb-0">Quality Control</p>
                <h5 class="text-info mb-0">Click me!</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
