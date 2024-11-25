@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <div id="alertContainer" style="display: none;" class="alert" role="alert"></div>

                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="test@test.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="12345678" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" id="submitButton" class="btn btn-primary btn-lg">Login</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#loginForm').submit(function (event) {
            event.preventDefault(); 
            
                var email = $('#email').val();
            var password = $('#password').val();

                $('#submitButton').prop('disabled', true).text('Logging in...');
            $.ajax({
                url: '{{ route("login") }}',
                method: 'POST',
                data: {
                    email: email,
                    password: password,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Redirect to dashboard if successful 
                    setTimeout(function() {
                        window.location.href = '/dashboard';
                    }, 1000);
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON;
                    var errorMessage = 'Invalid credentials. Please try again.';                    
                    $('#alertContainer').removeClass('alert-success').addClass('alert-danger').text(errorMessage).show();
                    $('#submitButton').prop('disabled', false).text('Login');
                }
            });
        });
    });
</script>
