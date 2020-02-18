<footer class="content-info bg-principal py-4">
  <div class="container">
    <div class="row d-flex">
      <div class="col bloque py-3">
        <h3>{{ __('Navegación', 'sage') }}</h3>
        @if (has_nav_menu('footer_navigation'))
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </div>
        @if (!empty($links))
          @foreach ($links as $link)
            <div class="col bloque py-3">
            @php
            $args = [
              'post_type'              => ['links'],
              'post_status'            => 'publish',
              'tax_query'              => [
                  [
                    'taxonomy'         => 'link-category',
                    'terms'            => $link,
                  ],
                ],
            ];
            $link_posts = new WP_Query($args);
            @endphp
            @if ($link_posts->have_posts())
              <h3>{{ $link->name }}</h3>
              <ul>
              @while ($link_posts->have_posts()) @php $link_posts->the_post();
                $link = get_field('url') @endphp
                <li>
                  <a href="{{ $link['url'] }}" target="{{ $link['target'] }}"> {{ $link['title'] }}</a>
                </li>
              @endwhile
              </ul>
            @endif
            </div>
          @endforeach
        @endif
    </div>
  </div>
</footer>
