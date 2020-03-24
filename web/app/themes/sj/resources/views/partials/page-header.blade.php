<div class="page-header p-4 mt-md-4 text-center w-100">
  @if(is_tax('article-type') || is_post_type_archive('text'))
    @if (is_tax('article-type', 'rincon'))
      <div class="icon">
        <i class="fas fa-graduation-cap"></i>
      </div>
    @else
      <div class="icon">
        <i class="fas fa-pen-fancy"></i>
      </div>
    @endif
    <h1>{!! App::title() !!}</h1>
    <nav class="submenu">
      @if (has_nav_menu('texts_navigation'))
      {!! wp_nav_menu(['theme_location' => 'texts_navigation', 'menu_class' => 'menu-textos']) !!}
      @endif
    </nav>
  @elseif (is_post_type_archive('story'))
    <i class="fas fa-newspaper"></i>
    <h1>{!! App::title() !!}</h1>
  @elseif (is_post_type_archive('sentence') || is_tax('sentence-category'))
    <i class="fas fa-gavel"></i>
    <h1>{!! App::title() !!}</h1>
    <nav class="submenu">
      @if (has_nav_menu($menus['sentence_navigation']))
      {!! wp_nav_menu(['theme_location' => $menus['sentence_navigation'], 'menu_class' => 'menu-sentencias']) !!}
      @endif
    </nav>
    </nav>
  @elseif ($pag_newsletter)
    <i class="fas fa-envelope-open-text"></i>
    <h1>{!! App::title() !!}</h1>
  @elseif (is_page('plataforma'))
    <div class="icon">
      <i class="fas fa-home"></i> <i class="fas fa-credit-card"></i>
    </div>
    <h1>{{ __('Plataforma afectados IRPH y tarjetas revolving', 'sage') }} </h1>
  @else
    <h1>{!! App::title() !!}</h1>
  @endif
</div>
