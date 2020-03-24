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
          <div class="subcabecera text-center">
            <div class="icon">
              <i class="fas fa-home fa-2x"></i>
            </div>
            <h2 class="font-italic">{{ __('Hipotecas', 'sage') }}</h2>
            <nav class="submenu">
              @if (has_nav_menu($menus['sub_hipotecas_navigation']))
              {!! wp_nav_menu(['theme_location' => $menus['sub_hipotecas_navigation'], 'menu_class' => 'submenu']) !!}
              @endif
            </nav>
          </div>
          @query($args_hipo)
          <ul class="ultimos">
            @posts
              <li>
                <a href="@permalink">@title</a>
              </li>
            @endposts
          </ul>
          @wpautop($hipo_term->description)
        </div>
        <div class="tarjetas col-md-6">
          <div class="subcabecera text-center">
            <div class="icon">
              <i class="fas fa-credit-card  fa-2x"></i>
            </div>
            <h2 class="font-italic">{{ __('Tarjetas', 'sage') }}</h2>
            <nav class="submenu">
              @if (has_nav_menu($menus['sub_tarjetas_navigation']))
              {!! wp_nav_menu(['theme_location' => $menus['sub_tarjetas_navigation'], 'menu_class' => 'submenu']) !!}
              @endif
            </nav>
          </div>
          @query($args_tarj)
          <ul class="ultimos">
            @posts
              <li>
                <a href="@permalink">@title</a>
              </li>
            @endposts
          </ul>
          @wpautop($tarj_term->description)
        </div>
      </div>
    </div>

  @endwhile
@endsection
