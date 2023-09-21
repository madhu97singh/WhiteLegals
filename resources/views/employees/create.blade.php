@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Employee</h1>

        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
