@php the_content() @endphp

@if ( have_rows('locations') )
  <div class="ubicaciones">
    <div class="separador">
      <h3>{{ __('Where we are', 'sage') }}</h3>
    </div>
    <div class="flex">
      @while (have_rows('locations')) @php the_row(); @endphp
        <div class="ubicacion">
          <h4>{{ the_sub_field('title') }}</h4>
          <p> {{ the_sub_field('description') }}</p>
        </div>
      @endwhile
    </div>
  </div>
@endif



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
