@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      @include('partials.page-header')
    </div>
  </div>

<div class="container">
  <div class="row">
    <div class="infinite-scroll-container">
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
  </div>
</div>

  {!! get_the_posts_navigation() !!}

  @include('partials.loader')

  <div id="template-sj" style="display: none;">
    <strong>{{ __('Superbia Jurídico en los medios', 'sage') }}</strong>
  </div>
  <div id="template-qj" style="display: none;">
    <strong>{{ __('Quercus Jurídico en los medios', 'sage') }}</strong>
  </div>
@endsection
