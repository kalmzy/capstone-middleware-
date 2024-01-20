@extends('layouts/layoutMaster')

@section('title', 'Data Connection')
@section('content')


<div class="container">
<a href="{{ route('dataCon.create') }}" class="btn btn-primary mb-2">Create New Task</a>
  <div class="row">
    <div class="col-4">
      <div class="table-responsive mb-4">
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th class="Hcol">Unit</th>
              <th>Sale</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dataCon as $dc)
            <tr>
              <td class="text-primary">{{$dc->product_unit}}</td>
              <td class="">{{$dc->sale}}</td>
              <td class="text-info">{{$dc->created_at->format('y-m-d')}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="col-1">
        {{ $dataCon->links('pagination::Bootstrap-4') }}
      </div>
      </div>

      
    </div>

    <div class="col-8">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th rowspan="2" class="text-primary">
                <label for="productFilter" >Product:</label>
      <select id="productFilter"  >
        @foreach($dataCon as $dc)
        <option>{{$dc->product_unit}}</option>
        @endforeach
      </select>
    </th>
              @for($i = 1; $i <= 12; $i++)
              <th>{{ date('M', mktime(0, 0, 0, $i, 1)) }}</th>
              @endfor
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Unit in Storage</th>
              <th>123</th>
            </tr>
            <!-- Additional rows for each metric (Unit Sold, Price Per Unit, Revenue) -->
            <tr>
              <th>Unit Sold</th>
              <th>123</th>
            </tr>
            <tr>
              <th>Price Per Unit</th>
              <th>123</th>
            </tr>
            <tr>
              <th>Revenue</th>
              <th>123</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection
