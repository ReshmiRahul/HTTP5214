@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <h2 class="display-2">
                Add a new course
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('courses.store') }}" method='POST'>
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Course Code</label>
                    <input type="text" class="form-control" id="code" name="code">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>     
                <button type="submit" class="btn btn-primary">Add Course</button>
            </form>      
        </div>
    </div>
@endsection