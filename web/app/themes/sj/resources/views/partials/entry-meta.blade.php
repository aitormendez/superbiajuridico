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
  <div>
    @if (is_singular('text') || is_post_type_archive('text') || is_tax() )
      @if (!is_tax('news-category'))

            @foreach ($los_autores as $autor)
            <div class="avatar">
              <img src="{{$autor['avatar_url']}}" alt="{{ $autor['nombre'] }}">
            </div>
            <div class="datos">
              <p class="byline author vcard">
                <a href="{{ $autor['pagina_autor'] }}" rel="author" class="fn">
                  {{ $autor['nombre'] }}
                </a>
                {!! $autor['info'] !!}
              </p>
            </div>
            @endforeach

      @endif
    @endif
    <time class="updated" datetime="{{ $fecha_pub_iso }}">{{ $fecha_pub }}</time>
  </div>
</div>
