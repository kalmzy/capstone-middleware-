<!-- resources/views/tasks/create.blade.php -->
@extends('layouts/layoutMaster')


@section('content')
    <h1>Create New Task</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Defect</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="product_unit">Product Unit:</label>
                            <input type="text" class="form-control" id="product_unit" name="product_unit" required>
                        </div>
                        <div class="form-group">
                            <label for="location_part_id">Location :</label>
                            <textarea class="form-control" id="location_part_id" name="location_part_id" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="severity_level">Severity Level:</label>
                            <select class="form-control" id="severity_level" name="severity_level" required>
                                <option value="Critical">Critical</option>
                                <option value="Major">Major</option>
                                <option value="Minor">Minor</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="root_cause_analysis">Root Cause Analysis:</label>
                            <textarea class="form-control" id="root_cause_analysis" name="root_cause_analysis" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="corrective_action_taken">Corrective Action Taken:</label>
                            <textarea class="form-control" id="corrective_action_taken" name="corrective_action_taken" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="verification_of_correction">Verification of Correction:</label>
                            <select class="form-control" id="verification_of_correction" name="verification_of_correction" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Open">Open</option>
                                <option value="Resolved">Resolved</option>
                                <option value="Closed">Closed</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="notes_comments">Notes/Comments:</label>
                            <textarea class="form-control" id="notes_comments" name="notes_comments" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
