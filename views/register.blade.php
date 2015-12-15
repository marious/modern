@extends('base')

        @section('browserTitle') App: Register @stop

          @section('containerContent')
                <div class="col-md-8 col-md-offset-2">
                    <h1>Register</h1>

                  @include('partials._flash_errors')

                    <hr>
                    <form  method="post" action="" class="form-horizontal" id="registerForm">

                    <div class="form-group">
                      <label for="first_name" class="col-sm-2 control-label">First Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="{{ set_value('first_name') }}">
                      </div>

                    </div>
                         <div class="form-group">
                        <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="{{ set_value('last_name') }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ set_value('email') }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="verify_email" class="col-sm-2 control-label">Verify Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="verify_email" class="form-control" id="verify_email" placeholder="Verify Email" value="{{ set_value('verify_email') }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="verify_password" class="col-sm-2 control-label">Verify Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="verify_password" class="form-control" id="verify_password" placeholder="Verify Password">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                      </div>
                    </form>
                </div>
          @stop


        @section('script')
        <script>
            $('#registerForm').validate({
                rules: {
                    first_name: {required: true},
                    last_name: {required: true},
                    email: {required: true, email: true},
                    verify_email: {required: true, email: true, equalTo: "#email"},
                    password: {required: true},
                    verify_password: {required: true, equalTo: "#password"}
                }
            });

            $('#registerForm').on('submit', function() {
            var error = $('div.form-group').siblings('.error').html();
            if (error != '') {
              $('.error').closest('div.form-group').addClass('has-error');
            }
          });

          $('input').on('blur', function() {
              var error = $(this).siblings('.error').html();
              if (error == "") {
                $(this).parents('div.form-group').removeClass('has-error');
              }
          });
        </script>
  @stop