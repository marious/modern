             @if (App\Libs\Session\Session::exists('errors'))
            <ul class="alert alert-danger">
            @foreach (App\Libs\Session\Session::flash('errors') as $error)
              <li>{!! $error !!}</li>
            @endforeach
            </ul>
          @endif