@extends('layouts/layoutMaster')


@section('content')

<div class="container">
    <h1>Create Quality Standard</h1>
    <form action="{{ route('quality_standards.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="purpose_scope" class="form-label">Purpose Scope:</label>
            <input type="text" name="purpose_scope" id="purpose_scope" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="quality_policy" class="form-label">Quality Policy:</label>
            <input type="text" name="quality_policy" id="quality_policy" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="quality_objectives" class="form-label">Quality Objectives:</label>
            <input type="text" name="quality_objectives" id="quality_objectives" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="documentation_procedures" class="form-label">Documentation Procedures:</label>
            <input type="text" name="documentation_procedures" id="documentation_procedures" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="quality_control_measures" class="form-label">Quality Control Measures:</label>
            <input type="text" name="quality_control_measures" id="quality_control_measures" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="training_competence" class="form-label">Training Competence:</label>
            <input type="text" name="training_competence" id="training_competence" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="monitoring_measurement" class="form-label">Monitoring Measurement:</label>
            <input type="text" name="monitoring_measurement" id="monitoring_measurement" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="non_conformance_management" class="form-label">Non-Conformance Management:</label>
            <input type="text" name="non_conformance_management" id="non_conformance_management" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="continuous_improvement" class="form-label">Continuous Improvement:</label>
            <input type="text" name="continuous_improvement" id="continuous_improvement" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="compliance_regulations" class="form-label">Compliance Regulations:</label>
            <input type="text" name="compliance_regulations" id="compliance_regulations" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="supplier_management" class="form-label">Supplier Management:</label>
            <input type="text" name="supplier_management" id="supplier_management" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="customer_satisfaction" class="form-label">Customer Satisfaction:</label>
            <input type="text" name="customer_satisfaction" id="customer_satisfaction" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection