    @extends('base')

    @section('browserTitle') App: Login @stop

        @section('containerContent')
                <div class="col-md-8 col-md-offset-2">
                    <h1>Acme</h1>

                     @include('partials._flash_errors')

                    <hr>

                    <form  method="post" action="/login" class="form-horizontal" name="loginForm" id="loginForm">

                    {!! csrf_field() !!}

                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ set_value('email') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                      </div>
                    </form>
                </div>
        @stop

        @section('script')
        <script>
          $('#loginForm').validate({
              rules: {
                  email: {required: true, email: true},
                  password: {required: true},
              }
          });
         </script>

        @stop
