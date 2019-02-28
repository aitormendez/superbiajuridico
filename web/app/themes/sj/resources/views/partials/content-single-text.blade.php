<article  {{ post_class() }}>

  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
    @if (has_excerpt())
      <div class="excerpt">
        <h2 class="epi-meta">{{ __('In short', 'sage') }}</h2>
          @php the_excerpt() @endphp
      </div>
    @endif
    @php
      $sentencias = get_field('sentencias_asociadas');
    @endphp
    @if ($sentencias)
      <div class="sentencias">
        <h2 class="epi-meta">{{__('Related sentences', 'sage')}}</h2>
          <ul>
            @foreach ($sentencias as $sentencia)
              <li>
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


                <span class="codigo"><strong>{{ $tribunal . '-' . $identificador }}</strong>. <a href="{{ get_permalink($sentencia->ID) }}"> {{ $nombre }} </a></span>
                @if ($pdf)
                  | <a href="{{ $pdf['url'] }}" target="_blank" alt="{{ $pdf['title'] }}">PDF</a>
                @endif
                @if ($url_externa)
                |<a href="{{ $url_externa }}" target="_blank"> Ver en Cendoj</a>
                @endif
              </li>
            @endforeach
          </ul>
      </div>
    @endif

    @php the_content() @endphp
  </div>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
