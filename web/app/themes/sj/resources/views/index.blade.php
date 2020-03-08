@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  @if (!have_posts())
    <div class="buscar container justify-content-center">
      <div class="row mx-4 mx-md-0 d-flex justify-content-center">
        <div class="alert alert-warning">
          {{ __('No se encontraron resultados.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      </div>
    </div>

  @else
    <div class="container">
      <div class="row mx-1 mx-md-4">
        <div class="infinite-scroll-container mx-4 mx-md-0">
          @while (have_posts()) @php the_post() @endphp
            @include('partials.content-'.get_post_type())
          @endwhile
        </div>
      </div>
    </div>
    @include('partials.loader')
  @endif
  {!! get_the_posts_navigation() !!}

  <div id="template" style="display: none;">
    <strong>{{ __('Superbia Jurídico en los medios', 'sage') }}</strong>
  </div>
@endsection

