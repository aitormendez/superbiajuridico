@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @include('partials.no-posts')

<div class="infinite-scroll-container">
  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile
</div>

  {!! get_the_posts_navigation() !!}
@endsection
