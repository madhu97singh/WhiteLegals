@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div><br><br><br>
            <a class="btn btn-info mr-15" style="color: #fff"  href="{{ url('/employees/index') }}">Go to The Employees Dashboard</a>
            <a class="btn btn-info" style="color: #fff"  href="{{ url('/clients/index') }}">Go to The Clients Dashboard</a><br>
        </div>
    </div>
</div>
@endsection
