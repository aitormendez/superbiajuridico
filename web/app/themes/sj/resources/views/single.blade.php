@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="container">
      <div class="row mx-1 mx-md-4">
        @include('partials.content-single-'.get_post_type())
      </div>
    </div>
  @endwhile
@endsection
