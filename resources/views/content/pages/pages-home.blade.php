@extends('layouts/layoutMaster')

@section('vendor-style')
@endsection

@section('vendor-script')
<script src="assets/vendor/libs/sortablejs/sortable.js"></script>
@endsection

@section('page-script')
@endsection

@section('title', 'Home')

@section('content')

<div class="row justify-content-center align-items-center g-4">
  <div class="col-12 col-lg-9 text-center">
    <h1 class="display-6 mb-4">Welcome To Dashboard</h1>
    <p class="lead">
      Click on 'Demand Forecasting' or 'Quality Control' to explore further and harness the full potential of your data-driven strategies. Let's embark on this journey together towards efficiency and excellence.
    </p>
  </div>

  <div class="col-6 col-lg-8">
    <div class="row g-4 justify-content-center">
      <div class="col-6 col-lg-5 text-center">
        <div class="card card-border-shadow-primary">
          <div class="card-body">
            <a href="{{ route('pages-page-2') }}" class="card-link d-block p-3">
              <div class="d-flex align-items-center">
                <div class="icon-circle bg-label-primary me-3">
                  <i class="ti ti-chart-area-line-filled"></i>
                </div>
                <div>
                  <h5 class="mb-0">Demand Forecasting</h5>
                  <p class="mb-0 text-muted">Click me!</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-5 text-center">
        <div class="card card-border-shadow-info">
          <div class="card-body">
            <a href="{{ route('pages-page-3') }}" class="card-link d-block p-3">
              <div class="d-flex align-items-center">
                <div class="icon-circle bg-label-info me-3">
                  <i class="ti ti-device-desktop-analytics"></i>
                </div>
                <div>
                  <h5 class="mb-0">Quality Control</h5>
                  <p class="mb-0 text-muted">Click me!</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
