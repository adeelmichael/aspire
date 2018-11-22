@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-4">
                                <ul class="list-group">
                                    <li class="list-group-item active">Total Users</li>
                                    <li class="list-group-item">2</li>

                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list-group">
                                    <li class="list-group-item active">Coming Soon</li>

                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list-group">
                                    <li class="list-group-item active">Coming Soon</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
