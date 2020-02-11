<div class="page-header">

  @if (is_tax('article-type') || is_post_type_archive('text'))
    <div class="icon">
      <i class="fas fa-pen-fancy"></i>
    </div>

    <nav class="menu-textos-wrap">
      <h3 class="textos">
        {{ __('Textos', 'sage' )}}
      </h3>
      @if (has_nav_menu('texts_navigation'))
      {!! wp_nav_menu(['theme_location' => 'texts_navigation', 'menu_class' => 'menu-textos']) !!}
      @endif
    </nav>
  @endif

  <h1>{!! App::title() !!}</h1>
</div>
