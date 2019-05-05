@php
  $datos =  FrontPage::itemSlider();
  if (has_post_thumbnail()) {
    $class_img = 'imagen';
  }
@endphp

@if ($datos['clase'] == 'story')
  @if (ArchiveStory::getEnlaceExterno())
    @php $enlace = ArchiveStory::getEnlaceExterno()['url'] @endphp
  @else
   @php $enlace = get_permalink() @endphp
  @endif
@else
  @php $enlace = get_permalink() @endphp
@endif

@if ($datos['clase'] == 'sentence')
  @php $referencia = get_field('tribunal') . '' . get_field('sentencia_no') . ' ' . get_field('fecha')  @endphp
@endif




<li class="glide__slide">
    <a href="{{ $enlace }}" class="{{ $datos['clase'] }} {{ $class_img ?? '' }}">
      <div class="col-1">
        <div class="seccion">
          {!! $datos['icono'] !!}
          <p>{{ __($datos['seccion'], 'sage') }}</p>
        </div>

        <div class="contenidos">
            @if ($datos['clase'] == 'sentence')
            <p class="referencia">{{ $referencia }}</p>
            <h2 class="entry-title">{{ get_field('nombre') }}</h2>
          @else
           <h2 class="entry-title">{!! get_the_title() !!}</h2>
          @endif

        <div class="entry-summary">
          @if (has_excerpt())
            @wpautop(get_the_excerpt())
          @endif
        </div>
        </div>
      </div>

    @if (has_post_thumbnail())
    <div class="img">
      @thumbnail('cuadrado-1000')
    </div>
    @endif
  </a>
</li>
