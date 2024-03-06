@extends('layouts/layoutMaster')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h2>Quality Standards</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('quality_standards.create') }}" class="btn btn-primary">Create New Standard</a>
        </div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Purpose and Scope</th>
                    <th>Quality Policy</th>
                    <th>Quality Objectives</th>
                    <th>Documentation and Procedures</th>
                    <th>Quality Control Measures</th>
                    <th>Training and Competence</th>
                    <th>Monitoring and Measurement</th>
                    <th>Non-Conformance Management</th>
                    <th>Continuous Improvement</th>
                    <th>Compliance and Regulations</th>
                    <th>Supplier Management</th>
                    <th>Customer Satisfaction</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($standards as $standard)
                <tr>
                    <td>{{ $standard->name }}</td>
                    <td>{{ $standard->purpose_scope }}</td>
                    <td>{{ $standard->quality_policy }}</td>
                    <td>{{ $standard->quality_objectives }}</td>
                    <td>{{ $standard->documentation_procedures }}</td>
                    <td>{{ $standard->quality_control_measures }}</td>
                    <td>{{ $standard->training_competence }}</td>
                    <td>{{ $standard->monitoring_measurement }}</td>
                    <td>{{ $standard->non_conformance_management }}</td>
                    <td>{{ $standard->continuous_improvement }}</td>
                    <td>{{ $standard->compliance_regulations }}</td>
                    <td>{{ $standard->supplier_management }}</td>
                    <td>{{ $standard->customer_satisfaction }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
