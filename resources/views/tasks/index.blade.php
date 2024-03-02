<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.layoutMaster')
@section('title', 'Quality Data')
@section('content')

<style>
  
    .table tbody td {
    white-space: nowrap; /* Prevent text from wrapping in data cells */
}
.sortable-header {
    cursor: pointer;
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
      <table id="defectsTable" class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th class="no-wrap sortable-header" onclick="sortTable(0)">ID <span id="sortIcon0"></span></th>
            <th class="no-wrap sortable-header" onclick="sortTable(1)">Product name <span id="sortIcon1"></span></th>
            <th class="no-wrap sortable-header" onclick="sortTable(2)">Defects <span id="sortIcon2"></span></th>
            <th class="no-wrap sortable-header" onclick="sortTable(3)">Description <span id="sortIcon3"></span></th>
            <th class="no-wrap sortable-header" onclick="sortTable(4)">Status <span id="sortIcon4"></span></th>
            <th class="no-wrap sortable-header" onclick="sortTable(5)">Severity <span id="sortIcon5"></span></th>
            <th class="no-wrap sortable-header" onclick="sortTable(6)">Inspector <span id="sortIcon6"></span></th>
            <th class="no-wrap sortable-header" onclick="sortTable(7)">Created At <span id="sortIcon7"></span></th>
        </tr>
      </thead>
      <tbody>
        @foreach($defects as $defect)
        <tr>
            <td>{{ $defect->id }}</td>
            <td>{{ $defect->product->name }}</td>
            <td>{{ $defect->name }}</td>
            <td>{{ $defect->description }}</td>
            <td>{{ $defect->status }}</td>
            <td>{{ $defect->severity }}</td>
            <td>{{ $defect->inspector }}</td>
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
<script>
let ascendingOrders = [true, true, true, true, true, true, true, true];

function sortTable(columnIndex) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("defectsTable");
    switching = true;
    let sortIcon = document.getElementById("sortIcon" + columnIndex);
    sortIcon.innerHTML = ascendingOrders[columnIndex] ? "&#x25B2;" : "&#x25BC;";
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[columnIndex];
            y = rows[i + 1].getElementsByTagName("TD")[columnIndex];
            if (ascendingOrders[columnIndex] ? (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) : (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase())) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
    ascendingOrders[columnIndex] = !ascendingOrders[columnIndex];
}
  </script>


@endsection
