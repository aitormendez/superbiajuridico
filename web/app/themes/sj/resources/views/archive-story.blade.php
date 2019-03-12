@extends('layouts.app')

@section('content')
  @include('partials.page-header')

<div class="infinite-scroll-container">
  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile
</div>

  {!! get_the_posts_navigation() !!}
@endsection
