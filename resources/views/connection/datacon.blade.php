@extends('layouts/layoutMaster')

@section('title', 'Data Connection')
@section('content')

  
<div class="container">

  <div class="row">
    <div class="col-md-6">
      <a href="{{ route('dataCon.create') }}" class="btn btn-primary mb-2">Create New Task</a>
    </div>

    <div class="col-md-3">
      <div class="form-group">

        <form method="get" action="dataCon">
          <div class="input-group">
              <select class="form-select" name="product_filter">
                  <option value="">Products</option>
                  @foreach($distinctProduct as $product)
                      <option value="{{ $product }}" {{ $product == $ProductFilter ? 'selected' : '' }}>
                          {{ ucfirst($product) }}
                      </option>
                  @endforeach
      
              </select>
              <button type="submit" class="btn btn-primary">Filter</button>
          </div>
      </form>
          

      </div>
  </div>
  
      <div class="col-md-4">
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

      
      <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Product Data</th>
                        @foreach(range(1, 12) as $month)
                        <th>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Unit in Stock</td>
                        @foreach($dataWithMissingMonths as $data)
                        <td>{{ $data->totals }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Price per Unit</td>
                        @foreach($dataWithMissingMonths as $data)
                        <td>${{ $data->totalp }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Sold Unit</td>
                        @foreach($dataWithMissingMonths as $data)
                        <td>{{ $data->totalso }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Revenue</td>
                        @foreach($dataWithMissingMonths as $data)
                        <td>${{ $data->totala }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    



@endsection
