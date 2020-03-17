{{--
  Template Name: Plataforma
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
    <div class="container">
      <div class="row mx-1 mx-md-4">
        <div class="hipotecas col-md-6">
          <nav class="menu-textos-wrap">
            @if (has_nav_menu($menus['sub_hipotecas_navigation']))
            {!! wp_nav_menu(['theme_location' => $menus['sub_hipotecas_navigation'], 'menu_class' => 'submenu']) !!}
            @endif
          </nav>
          @query($args_hipo)
          @posts
           <h2 class="entry-title">@title</h2>
          @endposts
          @wpautop($hipo_term->description)
        </div>
        <div class="tarjetas col-md-6">
          <nav class="menu-textos-wrap">
            @if (has_nav_menu($menus['sub_tarjetas_navigation']))
            {!! wp_nav_menu(['theme_location' => $menus['sub_tarjetas_navigation'], 'menu_class' => 'submenu']) !!}
            @endif
          </nav>
          @query($args_tarj)
          @posts
           <h2 class="entry-title">@title</h2>
          @endposts
          @wpautop($tarj_term->description)
        </div>
      </div>
    </div>

  @endwhile
@endsection
