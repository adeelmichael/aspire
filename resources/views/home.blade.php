@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($loans as $data)
                        <div class="row">
                            <div class="col-3">
                                <ul class="list-group">
                                    <li class="list-group-item active">Loan Approved</li>
                                    <li class="list-group-item">{{ $data->amount }} USD</li>

                                </ul>
                            </div>
                            <div class="col-3">
                                <ul class="list-group">
                                    <li class="list-group-item active">Installment Plan</li>
                                    <li class="list-group-item">{{ $data->repayment_freq }}</li>
                                </ul>
                            </div>
                            <div class="col-3">
                                <ul class="list-group">
                                    <li class="list-group-item active">Duration</li>
                                    <li class="list-group-item">{{ $data->duration }}</li>
                                </ul>
                            </div>

                            <div class="col-3">
                                <ul class="list-group">
                                    <li class="list-group-item active">Installment/M</li>
                                    <li class="list-group-item">
                                        {{ ceil($data->monthyly_installment) }} USD
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        @if(!empty($data))
                        <div class="row">
                                <form action="{{ route('user.pay.loan') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="loan_id" value="{{ $data->id }}">
                                    <div class="form-group row mt-5">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Pay Loan') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
