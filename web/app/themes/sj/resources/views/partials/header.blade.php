@if (is_front_page())
  @php
    $clasebanner = 'banner full';
  @endphp
@else
  @php
    $clasebanner = 'banner';
  @endphp
@endif

@if (is_admin_bar_showing())
  @php
    $clasebanner .= ' adminbar';
  @endphp
@endif

@php
  $nombre_para_alt = get_bloginfo('name')
@endphp

<header class="{{ $clasebanner }}">
  <a class="brand css-transitions-only-after-page-load" href="{{ home_url('/') }}">
    <div class="logovert">
      @svg('sj-logo-vert', ['alt' => $nombre_para_alt ])
    </div>
    <div class="logohoriz">
      @svg('sj-logo-horiz', ['alt' => $nombre_para_alt ])
    </div>
  </a>

  <button class="hamburger hamburger--spin" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>


  <nav id="solapa" class="solapa">
    @if (has_nav_menu('lang_navigation'))
    {!! wp_nav_menu(['theme_location' => 'lang_navigation', 'menu_class' => 'menu-lenguaje']) !!}
    @endif

    @if (has_nav_menu('insti_navigation'))
    {!! wp_nav_menu(['theme_location' => 'insti_navigation', 'menu_class' => 'menu-institucional']) !!}
    @endif

    @if (has_nav_menu('primary_navigation'))
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu-principal', 'walker' => new \App\Walkers\sj_navwalker()]) !!}
    @endif

    <div id="buscar">
      <a role="button" class="cruz">
        <i class="fas fa-cruz"></i>
      </a>

      {!! get_search_form(false) !!}
    </div>

    <div class="boton-solapa-buscar">
      <i class="fas fa-buscar"></i>
    </div>
  </nav>
</header>

