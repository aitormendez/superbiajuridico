@if (is_front_page())
  @php
    $claselogo = 'logotipo mediano';
    $claseanagrama = 'anagrama';
    $clasebanner = 'banner med';
  @endphp
@else
  @php
    $claselogo = 'logotipo';
    $claseanagrama = 'anagrama hide';
    $clasebanner = 'banner';
  @endphp
@endif

@if (is_admin_bar_showing())
  @php
  $clasebanner .= ' adminbar';
  @endphp
@endif


<header class="{{ $clasebanner }}">
  <a class="brand css-transitions-only-after-page-load" href="{{ home_url('/') }}">
    <div class="{{ $claselogo }}">
      <div class="simbolo">
        <div class="escudo">
          @if (is_front_page())
            @svg('sj-logo-escudo-mediano')
          @else
            @svg('sj-logo-escudo-peq')
          @endif
        </div>
        <div class="ventana">
          @svg('sj-logo-ventana')
        </div>
        <div class="{{ $claseanagrama }}">
          @svg('sj-sj')
        </div>
      </div>
      <div class="nombre">
        {{ get_bloginfo('name', 'display') }}
      </div>
    </div>
  </a>
  @if (has_nav_menu('lang_navigation'))
    {!! wp_nav_menu(['theme_location' => 'lang_navigation', 'menu_class' => 'lang']) !!}
  @endif
  @if (is_post_type_archive('text') || is_singular('text') || is_tax('article-type') )
    <nav class="epigrafe">
      <a href="{{ get_post_type_archive_link( 'text' ) }}">{{ __( 'Textos', 'sage' ) }}</a> | <a href="{{ get_term_link( 'articulo', 'article-type' ) }}">{{ __('Artículos', 'sage')}}</a> | <a href="{{ get_term_link( 'comentario', 'article-type' ) }}">{{__('Comentarios', 'sage')}}</a> | <a href="{{ get_term_link( 'resumen', 'article-type' ) }}">{{__('Resúmenes', 'sage')}}</a>
    </nav>
  @elseif (is_post_type_archive('story') || is_singular('story') || is_tax('news-category', 'superbia-juridico'))
    <nav class="epigrafe">
      <a href="{{ get_post_type_archive_link( 'story' ) }}">{{ __( 'Noticias', 'sage' ) }}</a>
    </nav>
  @endif
  @if (is_post_type_archive( 'text' ) || is_singular('text'))
    <a id="filtro" class="closed">
      <div class="flash"></div>
    </a>
    <nav id="solapa-filtro" class="closed solapa">
      @if (is_singular('text'))
        <h1>{{ __( 'Ámbito', 'sage' ) }}</h1>
        {!! $art_cat_term_list !!}
        <h1>{{ __( 'Temas', 'sage' ) }}</h1>
        {!! $art_tag_term_list !!}
      @elseif (is_post_type_archive( 'text' ))
        <h1>{{ __( 'Ámbito', 'sage' ) }}</h1>
        {!! $all_art_cat_term_list !!}
        <h1>{{ __( 'Temas', 'sage' ) }}</h1>
        {!! $all_art_tag_term_list !!}
      @endif
    </nav>
  @endif
  <nav id="solapa" class="closed solapa">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
    <div id="buscar" class="closed solapa">
      {!! get_search_form(false) !!}
    </div>
  </nav>
  <a id="busc" class="closed invisible">
    <div class="flash"></div>
  </a>
  <a id="hamb" class="closed">
    <div class="flash"></div>
  </a>
</header>
