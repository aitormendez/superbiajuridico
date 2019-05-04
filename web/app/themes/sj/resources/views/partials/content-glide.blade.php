@php
  $datos =  FrontPage::itemSlider();
  if (has_post_thumbnail()) {
    $class_img = 'imagen';
  }
@endphp


<li class="glide__slide">
    <a href="{{ get_permalink() }}" class="{{ $datos['clase'] }} {{ $class_img ?? '' }}">
      <div class="datos">
        <div class="seccion">
          {!! $datos['icono'] !!}
          <p>{{ $datos['seccion'] }}</p>
        </div>
        <h2 class="entry-title">
          {!! get_the_title() !!}
        </h2>
        <div class="entry-summary">
          @if (has_excerpt())
            @wpautop(get_the_excerpt())
          @endif
        </div>
      </div>

    @if (has_post_thumbnail())
    <div class="img">
      @thumbnail('cuadrado-1000')
    </div>
    @endif
  </a>
</li>
