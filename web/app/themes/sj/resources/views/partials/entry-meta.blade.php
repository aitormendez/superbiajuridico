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
        <p class="byline author vcard">
          <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
            {{ get_the_author() }}
          </a>
          {!! get_field('info_adicional', 'user_' . get_the_author_meta('ID')) !!}
        </p>
      @endif
    @endif
    <time class="updated" datetime="{{ $fecha_pub_iso }}">{{ $fecha_pub }}</time>
  </div>
</div>
