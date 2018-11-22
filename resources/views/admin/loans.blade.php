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


                        <form method="POST" action="{{ route('admin.store.loans') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <select name="users" id="users" class="form-control">
                                        <option value="">Select Users</option>
                                        @foreach($users as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Loan Amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Loan Duration') }}</label>

                                <div class="col-md-6">
                                    <input id="duration" type="duration" class="form-control" name="duration" value="{{ old('duration') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="frequency" class="col-md-4 col-form-label text-md-right">{{ __('Repayment Frequency') }}</label>

                                <div class="col-md-6">
                                    <input id="frequency" type="text" class="form-control" name="frequency" value="{{ old('frequency') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="interest" class="col-md-4 col-form-label text-md-right">{{ __('Interest Rate') }}</label>

                                <div class="col-md-6">
                                    <input id="interest" type="text" class="form-control" name="interest" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fee" class="col-md-4 col-form-label text-md-right">{{ __('Arrangement Fee') }}</label>

                                <div class="col-md-6">
                                    <input id="fee" type="text" class="form-control" name="fee" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Loan') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#users").change(function(){
            var id = $("#users").val();

            $.ajax({
                type: 'get',
                url: '/admin/users/loans/'+id,
                success: function(data)
                {
                    if(data['user_id'] == id){
                        alert("Loan has already been created for this user");
                    }
                }
            });
        });
    });
</script>
