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
<div class="row">
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-brand-speedtest"></i></span>
          </div>
          <h4 class="ms-1 mb-0">Severity Level</h4>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between">
            <div>
              <div class="badge bg-label-success me-3 rounded p-2">
                LOW :
              </div>
              
            </div>
            <div class="text-end">
              <span>{{$Low}}</span>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <div>
              <div class="badge bg-label-warning me-3 rounded p-2">
                MEDIUM :
              </div>
              
            </div>
            <div class="text-end">
              <span>{{$Medium}}</span>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <div>
              <div class="badge bg-label-danger me-3 rounded p-2">
                CRITICAL :
              </div>
              
            </div>
            <div class="text-end">
              <span >{{$Critical}}</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-settings-exclamation"></i></i></span>
            </div>
            <h4 class="ms-1 mb-0">Most Defectives </h4>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <div class="badge bg-label-danger me-3 rounded p-2">
                  prodcut 1 :
                </div>    
              </div>
              <div class="text-end">
                <span >30defect</span>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <div class="badge bg-label-danger me-3 rounded p-2">
                  prodcut 1 :
                </div>
                
              </div>
              <div class="text-end">
                <span >30defect</span>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <div class="badge bg-label-danger me-3 rounded p-2">
                  prodcut 1 :
                </div>
                
              </div>
              <div class="text-end">
                <span >30defect</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-search"></i></i></span>
            </div>
            <h4 class="ms-1 mb-0">Inspection</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-info"><i class="ti ti-arrow-back-up"></i></i></span>
            </div>
            <h4 class="ms-1 mb-0">Returned</h4>
          </div>
          <p class="mb-1">Late vehicles</p>
          <p class="mb-0">
            <span class="fw-medium me-1">-2.5%</span>
            <small class="text-muted">than last week</small>
          </p>
        </div>
      </div>
    </div>
  </div>

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
