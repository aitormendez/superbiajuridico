@extends('layouts.app')

@section('content')

  <nav>
    <ul class="tabs">
      <li><span>Sentencias relevantes</span></li>
      <li><a href="{{ get_bloginfo('url') }}/sentences-sj">Sentencias de Superbia Jurídico</a></li>
    </ul>
  </nav>
  <ul class="infinite-scroll-container">
    @while (have_posts()) @php the_post() @endphp
      @include('partials.content-'.get_post_type())
    @endwhile
  </ul>

  {!! get_the_posts_navigation() !!}
@endsection
