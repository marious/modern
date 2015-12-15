@extends('base')

@section('browserTitle')Testimonials @stop

@section('containerContent')
    <h1>Testimonials</h1>
        <div class="list-group">
        <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">Testimonials</h4>
        </a>

        @foreach ($testimonials as $item)
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">{!! $item->title !!}</h4>
                <p class="list-group-item-text">{!! $item->created_at->toFormattedDateString() !!}</p>
                <p>{!! $item->testimonial !!}</p>
            </a>
        @endforeach
        </div>
@stop


