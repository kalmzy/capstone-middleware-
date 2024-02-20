@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Quality Control')
@section('vendor-style')

<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

@endsection

@section('vendor-script')

@endsection
@section('page-script')

@endsection
@section('content')

<div class="table-responsive col-6">
    <table class="table table-bordered ">
      <thead class="table-dark">
        <tr >
            <th class="text-primary"><b>Product Name</b></th>
            <th class="text-primary"><b>Inspector</b></th>
            <th class="text-primary"><b>Result</b></th>
            <th class="text-primary"><b>Comments</b></th>
            <th class="text-primary"><b>Date</b></th>
            
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
            <tr>
                <td>iphone</td>
                <td>ak nieva</td>
                <td>defect</td>
                <td>this product is defected</td>
                <td>23rd February,2019</td>
            </tr>
            <tr>
                <td>iphone</td>
                <td>ak nieva</td>
                <td>defect</td>
                <td>this product is defected</td>
                <td>23rd February,2019</td>
            </tr>
            
      </tbody>
    </table>
  </div>

@endsection
