@extends('base')

@section('containerContent')
    <h1>Add Testimonial</h1>

    <div class="col-sm-offset-2 col-sm-10">
        @include('partials._flash_errors')
    </div>

    <form action="" method="post" name="testimonialForm" id="testimonialForm" class="form-horizontal">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" value="{{ set_value('title') }}" class="form-control" id="title" placeholder="Title" required>
            </div>
        </div>

        <div class="form-group">
            <label for="testimonial" class="col-sm-2 control-label">Testimonial</label>
            <div class="col-sm-10">
                <textarea name="testimonial" value="{{ set_value('testimonial') }}" class="form-control" id="testimonial" required>{{ set_value('testimonial') }}</textarea>
            </div>
        </div>

        <hr>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Save Testimonial</button>
            </div>
        </div>
    </form>
@stop

@section('script')
    <script>
          $('#testimonialForm').validate();
         </script>
@stop
