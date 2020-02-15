@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="container">
    <div class="row">
      <div class="infinite-scroll-container mx-4 mx-md-0 mb-5">
        @while(have_posts()) @php the_post() @endphp
        @include('partials.content-search')
      @endwhile
      </div>
    </div>
  </div>
  @include('partials.loader')
  {!! get_the_posts_navigation() !!}
@endsection
