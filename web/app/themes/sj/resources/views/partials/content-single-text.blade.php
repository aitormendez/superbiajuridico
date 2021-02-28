<article {{ post_class() }}>

  <header class="mx-4 mx-md-0 mt-5 mb-4">
    <h1 class="entry-title mb-4">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="mx-4 mx-md-0 pb-5">
    @if (has_excerpt())
      <div class="excerpt p-3">
        <h2 class="epi-meta">{{ __('En breve', 'sage') }}</h2>
          @php the_excerpt() @endphp
      </div>
    @endif
    @php
      $sentencias = get_field('sentencias_asociadas');
    @endphp
    @if ($sentencias)
      <div class="sentencias p-3 mb-4">
        <h2 class="epi-meta mb-3">{{ __('Sentencias relacionadas', 'sage')}}</h2>
          <ul>
            @foreach ($sentencias as $sentencia)
              <li class="d-md-flex">
                @php
                  $pdf = get_field('pdf', $sentencia->ID);
                  $nombre = get_field('nombre', $sentencia->ID);
                  $url_externa = get_field('url_externa', $sentencia->ID);
                  $sentencia_no = get_field('sentencia_no', $sentencia->ID);
                  $tribunal = get_field('tribunal', $sentencia->ID);
                  $fecha= get_field('fecha', false, false);
                  $fecha_datetime = new DateTime($fecha);
                  $anio = $fecha_datetime->format('Y');
                @endphp

                @if ($sentencia_no == '')
                  @php $identificador = $fecha_datetime->format('j/n/Y'); @endphp
                @else
                  @php $identificador = $sentencia_no . '/' . $fecha_datetime->format('Y'); @endphp
                @endif

                @if ($nombre == '')
                  @php
                    $nombre = 'Enlace';
                  @endphp
                @endif

                <div class="identificador"><strong>{{ $tribunal . '-' . $identificador }}.</strong></div>

                <div class="der">
                  <a href="{{ get_permalink($sentencia->ID) }}"> {{ $nombre }} </a>
                  @if ($pdf)
                    | <a href="{{ $pdf['url'] }}" target="_blank" alt="{{ $pdf['title'] }}">
                      PDF</a>
                  @endif
                  @if ($url_externa)
                  |<a href="{{ $url_externa }}" target="_blank"> Ver en Cendoj</a>
                  @endif
                </div>


              </li>
            @endforeach
          </ul>
      </div>
    @endif
    <div class="entry-content">
      @php the_content() @endphp
    </div>
  </div>
</article>
