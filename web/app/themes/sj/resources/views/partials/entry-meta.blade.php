@if (is_singular('text') || is_post_type_archive('text') || is_post_type_archive('story') || is_singular('story') || is_front_page() || is_tax('article-type') || is_tax('news-category'))
  @php
    $fecha_pub_raw = new DateTime(get_field('fecha_pub', false, false ));
    $fecha_pub_iso = $fecha_pub_raw->format('c');
    $fecha_format = $fecha_pub_raw->format('j M Y');
    $unixtimestamp = strtotime( $fecha_pub_iso );
    $fecha_pub = date_i18n( "j M Y", $unixtimestamp );
  @endphp
@else
  @php
    $fecha_pub_iso = get_post_time('c', true);
    $fecha_pub = get_the_date();
  @endphp
@endif

<div class="meta">
    @if (is_singular('text'))
      <div class="autores d-flex flex-wrap">
        @foreach ($los_autores as $autor)
          <div class="autor">
            @if (array_key_exists('avatar_url', $autor))
              <div class="avatar">
                <img class="rounded-circle" src="{{$autor['avatar_url']}}" alt="{{ $autor['nombre'] }}">
              </div>
            @endif
            <div class="datos">
              <p class="byline author vcard">
                <a href="{{ $autor['pagina_autor'] }}" rel="author" class="fn">
                  {{ $autor['nombre'] }}
                </a>
                {!! $autor['info'] !!}
              </p>
            </div>
          </div>
        @endforeach
      </div>
    @elseif (is_post_type_archive('text') || is_tax() )
      @if (!is_tax('news-category') && !is_tax('tema', 'redes'))
        @php
            $autores = ArchiveText::losAutoresLoop();
        @endphp
        @foreach ($autores as $autor)
          <div class="autor">
            <div class="datos">
              <p class="byline author vcard">
                <a href="{{ $autor['pagina_autor'] }}" rel="author" class="fn">
                  {{ $autor['nombre'] }}
                </a>
              </p>
            </div>
          </div>
        @endforeach
      @endif
    @endif
    <time class="updated" datetime="{{ $fecha_pub_iso }}">{{ $fecha_pub }}</time>
</div>
