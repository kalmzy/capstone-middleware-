<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.layoutMaster')
@section('title', 'Quality Data')
@section('content')

<style>
  
    .table tbody td {
    white-space: nowrap; /* Prevent text from wrapping in data cells */
}
</style>

<div class="container">


<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-2">Create New Task</a>

<div class="row">
  <div class="col-md-6 col-xl-3 mb-4">
    <div class="card h-150">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title m-0 me-2">
              <h5 class="m-0 me-2">Product Defects</h5>
              <small class="text-muted">Total Defects by category in this Month</small>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-primary me-3 rounded p-2">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Dimension Defects</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-danger">{{ $defectCountByCategory['dimension'] }}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-success rounded me-3 p-2">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Packaging Defects</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-success">{{ $defectCountByCategory['packaging'] }}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-danger rounded me-3 p-2">
                 
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Surface Defects</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-success">{{ $defectCountByCategory['surface'] }}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-secondary me-3 rounded p-2">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Material Defects</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-danger">{{ $defectCountByCategory['material'] }}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-info me-3 rounded p-2">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Functional Defects</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-success">{{ $defectCountByCategory['functional'] }}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-success me-3 rounded p-2">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Aesthetic Defects</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-danger">{{ $defectCountByCategory['aesthetic'] }}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-danger me-3 rounded p-2">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Assembly Defects</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-success">{{ $defectCountByCategory['assembly'] }}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center">
                <div class="badge bg-label-success me-3 rounded p-2">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Labeling Defects</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-danger">{{ $defectCountByCategory['labeling'] }}</h6>
                  </div>
                </div>
              </li>
      
              
            </ul>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <!-- Defects table -->
    <div class="table-responsive mb-4">
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
              <th class="no-wrap" >ID</th>
              <th class="no-wrap" >Product name</th>
              <th class="no-wrap" >Defects</th>
              <th class="no-wrap" >Description</th>
              <th class="no-wrap" >Status</th>
              <th class="no-wrap" >Severity</th>
              <th class="no-wrap" >Assigned To</th>
              <th class="no-wrap" >Reported By</th>
              <th class="no-wrap" >Created At</th>
          </tr>
      </thead>
      <tbody>
        @foreach($defects as $defect)
        <tr>
            <td>{{ $defect->id }}</td>
            <td>{{ $defect->product->product_name }}</td>
            <td>{{ $defect->name }}</td>
            <td>{{ $defect->description }}</td>
            <td>{{ $defect->status }}</td>
            <td>{{ $defect->severity }}</td>
            <td>{{ $defect->assigned_to }}</td>
            <td>{{ $defect->reported_by }}</td>
            <td>{{ $defect->created_at }}</td>
        </tr>
        @endforeach
      </tbody>
  </table>
  <div class="col-1">
    {{ $defects->links('pagination::Bootstrap-4') }}
    </div>
  </div>
</div>
</div> 



@endsection
