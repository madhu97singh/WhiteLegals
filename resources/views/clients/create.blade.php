@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Client</h1>

        <form method="POST" action="{{ route('clients.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('clients.index') }}" class="btn btn-primary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
