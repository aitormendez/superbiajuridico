{{--
  Template Name: Contacto
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page-contact')
  @endwhile

  <div class="container">
    <div class="row py-3 mx-1 mx-md-4">
      @if ( have_rows('locations') )
        <div class="ubicaciones flex-column align-items-center">
          <h3 class="mb-3">{{ __('Dónde estamos', 'sage') }}</h3>
          <div class="d-sm-flex justify-content-center">
            @while (have_rows('locations')) @php the_row(); @endphp
              <div class="ubicacion">
                <h4>{{ the_sub_field('title') }}</h4>
                <p> {{ the_sub_field('description') }}</p>
              </div>
            @endwhile
          </div>
        </div>
      @endif
    </div>
  </div>



  @if ( have_rows('locations') )
    <div class="acf-map">
      @while (have_rows('locations')) @php the_row();
        $location = get_sub_field('location');
      @endphp
        <div class="marker" data-lat="{{ $location['lat'] }}" data-lng="{{ $location['lng'] }}">
          <h4>{{the_sub_field('title')}}</h4>
          <p class="address">{{ $location['address'] }}</p>
          <p> {{ the_sub_field('description') }}</p>
        </div>
      @endwhile
    </div>
  @endif
@endsection
