@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      @include('partials.page-header')
    </div>
  </div>
  <div class="container">
    <div class="row mx-1 mx-md-4">
      <ul class="infinite-scroll-container">
        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-'.get_post_type())
        @endwhile
      </ul>
    </div>
  </div>
  @include('partials.loader')

  {!! get_the_posts_navigation() !!}
@endsection
