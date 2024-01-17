@extends('layouts/layoutMaster')

@section('title', 'Data Connection')
@section('content')

<div class="table-responsive mb-4">
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th class="Hcol">Unit</th>
        <th class="Hcol">Jan</th>
        <th class="Hcol">Feb</th>
        <th class="Hcol">Mar</th>
        <th class="Hcol">Apr</th>
        <th class="Hcol">May</th>
        <th class="Hcol">June</th>
        <th class="Hcol">July</th>
        <th class="Hcol">Aug</th>
        <th class="Hcol">Sept</th>
        <th class="Hcol">Oct</th>
        <th class="Hcol">Nov</th>
        <th class="Hcol">Dec</th>
        <th class="Hcol">Total Sale</th>
      </tr>
    </thead>
    <tbody >
      @foreach($dataCon as $dc)
      <tr>
        <td class="text-primary">{{$dc->unit}}</td>
        <td>{{$dc->jan}}</td>
        <td>{{$dc->feb}}</td>
        <td>{{$dc->mar}}</td>
        <td>{{$dc->april}}</td>
        <td>{{$dc->may}}</td>
        <td>{{$dc->june}}</td>
        <td>{{$dc->july}}</td>
        <td>{{$dc->aug}}</td>
        <td>{{$dc->sept}}</td>
        <td>{{$dc->oct}}</td>
        <td>{{$dc->nov}}</td>
        <td>{{$dc->dec}}</td>
        <td>{{$dc->totalsale}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<label for="productFilter">Select Product:</label>
  <select id="productFilter">
  @foreach($dataCon as $dc)
  <option>{{$dc->unit}}</option>

   @endforeach
  </select>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th rowspan="2">Product Data</th>
        <th>Jan</th>
        <th>Feb</th>
        <th>Mar</th>
        <th>Apr</th>
        <th>May</th>
        <th>June</th>
        <th>July</th>
        <th>Sept</th>
        <th>Oct</th>
        <th>Nov</th>
        <th>Dec</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>Unit in Storage</th>
      </tr>
      <!-- Additional rows for each metric (Unit Sold, Price Per Unit, Revenue) -->
      <tr>
        <th>Unit Sold</th>

      </tr>
      <tr>
        <th>Price Per Unit</th>

      </tr>
      <tr>
        <th>Revenue</th>

      </tr>
    </tbody>
  </table>
</div>

@endsection
