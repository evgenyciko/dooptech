<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="d-flex justify-content-center">
                <div class="sign-up-content rounded-circle rounded-circle">
                    <form id="registerForm" class="signup-form" method="POST">
                        @csrf
                        <div class="form-textbox">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="nameInput" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus />
                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-textbox">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="emailInput" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" />
                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-textbox">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="passwordInput" class="@error('password') is-invalid @enderror" required autocomplete="new-password" />
                            <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-textbox">
                            <label for="pass">Confirm Password</label>
                            <input id="password-confirm" type="password" name="password_confirmation" class="" required autocomplete="new-password" />
                        </div>
                        <div class="col-md-12 ml-5">
                            <label class="radio">Mahasiswa
                                <input value="user" type="radio" checked="checked" name="status_user">
                                <span class="checkround"></span>
                            </label>
                            <label class="radio">Pembimbing
                                <input value="admin" type="radio" name="status_user">
                                <span class="checkround"></span>
                            </label>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <input type="submit" name="submit" value="Create account" />
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
@parent

<script>
    $(function() {
        $('#registerForm').submit(function(e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            $(".invalid-feedback").children("strong").text("");
            $("#registerForm input").removeClass("is-invalid");
            $.ajax({
                method: "POST",
                headers: {
                    Accept: "application/json"
                },
                url: "{{ route('register') }}",
                data: formData,
                success: () => window.location.assign("{{ route('home') }}"),
                error: (response) => {
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function(key) {
                            $("#" + key + "Input").addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);
                        });
                    } else {
                        window.location.reload();
                    }
                }
            })
        });
    });
</script>
@endsection