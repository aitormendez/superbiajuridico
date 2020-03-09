{{--
  Template Name: Subdespacho
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header-subdespacho')
  @endwhile

  @query($datos['args'])

  <div class="container">
    <div class="row mx-1 mx-md-4">
      <ul class="infinite-scroll-container mx-4 mx-md-0">
          @posts
            @include('partials.content-'.get_post_type())
          @endposts
      </ul>
    </div>
  </div>
@include('partials.loader')
@include('partials.template-tooltip')
<nav class="nav-links">
  {!! next_posts_link( 'anteriores', $query->max_num_pages) !!}
</nav>


@endsection
