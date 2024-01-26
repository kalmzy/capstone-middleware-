<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.layoutMaster')
@section('title', 'Quality Data')
@section('content')

<style>
    .table tbody td {
    white-space: nowrap; /* Prevent text from wrapping in data cells */
}
</style>
<div class="container mt-4">
<div class="row">
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-warning"><i class='ti ti-alert-triangle ti-md'></i></span>
          </div>
          <h4 class="ms-1 mb-0">Severity Level</h4>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Minor: {{$Minor}} </li>
          <li class="list-group-item">Major: {{$Major}} </li>
          <li class="list-group-item">Critical: {{$Critical}} </li>
        </ul>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-warning"><i class='ti ti-alert-triangle ti-md'></i></span>
            </div>
            <h4 class="ms-1 mb-0">8</h4>
          </div>
          <p class="mb-1">Vehicles with errors</p>
          <p class="mb-0">
            <span class="fw-medium me-1">-8.7%</span>
            <small class="text-muted">than last week</small>
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-danger"><i class='ti ti-git-fork ti-md'></i></span>
            </div>
            <h4 class="ms-1 mb-0">27</h4>
          </div>
          <p class="mb-1">Deviated from route</p>
          <p class="mb-0">
            <span class="fw-medium me-1">+4.3%</span>
            <small class="text-muted">than last week</small>
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-info"><i class='ti ti-clock ti-md'></i></span>
            </div>
            <h4 class="ms-1 mb-0">13</h4>
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

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="no-wrap" >Product</th>
                <th class="no-wrap" >Returned Date</th>
                <th class="no-wrap" >Location</th>
                <th class="no-wrap" >Description</th>
                <th class="no-wrap" >Severity</th>
                <th class="no-wrap" >Root Cause</th>
                <th class="no-wrap" >Corrective Action</th>
                <th class="no-wrap" >Verification</th>
                <th class="no-wrap" >Status</th>
                <th class="no-wrap" >Comments</th>
                <th class="no-wrap" >Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->product_unit}}</td>
                    <td>{{$task->created_at->format('M d, Y')}}</td>
                    <td>{{$task->location_part_id}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->severity_level}}</td>
                    <td>{{$task->root_cause_analysis}}</td>
                    <td>{{$task->corrective_action_taken}}</td>
                    <td>{{$task->verification_of_correction ? 'Yes' : 'No'}}</td>
                    <td>{{$task->status}}</td>  
                    <td>{{$task->notes_comments}}</td>
                    <td>{{$task->created_at->format('M d, Y')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-1">
      {{ $tasks->links('pagination::Bootstrap-4') }}
  </div>
</div>



</div>

@endsection
