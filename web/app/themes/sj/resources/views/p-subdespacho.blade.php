{{--
  Template Name: Subdespacho
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header-subdespacho')
  @endwhile

  @query($args)

  <div class="container">
    <div class="row mx-1 mx-md-4">
      <div class="infinite-scroll-container mx-4 mx-md-0">
        <ul>
          @posts
            @include('partials.content-'.get_post_type())
          @endposts
        </ul>
      </div>
    </div>
  </div>
@include('partials.loader')

<nav class="d-none">
  {!! next_posts_link( 'anteriores', $query->max_num_pages) !!}
</nav>


@endsection
