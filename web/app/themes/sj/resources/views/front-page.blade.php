@extends('layouts.app')

@section('content')

<section id="slide01" class="hero">

    <div class="bcg">
      <img src="{{ $img_portada[0]['url'] }}" alt="imagen portada" srcset="{{$img_portada[1] }}">
    </div>

    <div class="escudo">
      @svg('sj-escudo-blanco')
    </div>

    <div class="marco texto">
      <div class="texto">
        <p>{{ __('El Derecho de Familia y proteger a los niños que sufren la ruptura de sus padres, nuestra razón de ser.', 'sage') }}</p>
        <p>{{ __('Nuestra experiencia nos avala', 'sage') }}</p>
      </div>
    </div>
    <div class="marco pregunta">
      <div class="pregunta">
        <a href="{{ $contact_link }}">{{ __('Pregúntanos', 'sage') }}</a>
      </div>
    </div>
  </section>

<section class="slider">
    <div class="glide">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            @query($args_glide)
            @posts
              @include('partials.content-glide')
            @endposts
        </ul>
      </div>
      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
          <i class="fas fa-arrow-left">
        </i></button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
</section>

<section class="textos">
  <section class="articulos">
    <div class="header">
      <h1>{{ __('Últimos artículos', 'sage') }}</h1>
      <a class="enlace" href="{{ $site_url }}/text-type/articulo/">{{ __('Ver todos', 'sage') }}</a>
    </div>

    <div class="contenido">
      @query($args_article)
      @posts
        @include('partials.content-owl')
      @endposts
    </div>
  </section>

  <section class="articulos">
    <div class="header">
      <h1>{{ __('Últimas sentencias comentadas', 'sage') }}</h1>
      <a class="enlace" href="{{ $site_url }}/text-type/comentario/">{{ __('Ver todas', 'sage') }}</a>
    </div>

    <div class="contenido">
      @query($args_comment)
      @posts
        @include('partials.content-owl')
      @endposts
    </div>
  </section>

  <section class="articulos">
    <div class="header">
      <h1>{{ __('Últimos resúmenes de sentencias', 'sage') }}</h1>
      <a class="enlace" href="{{ $site_url }}/text-type/resumen/">{{ __('ver todos', 'sage') }}</a>
    </div>

    <div class="contenido">
      @query($args_abstract)
      @posts
        @include('partials.content-owl')
      @endposts
    </div>
  </section>
</section>

<section class="rincon">
  <div class="header">
    <i class="fas fa-graduation-cap"></i>
    <h1>{{ __('Rincón del profesor', 'sage') }}</h1>
    <a class="enlace" href="{{ $site_url }}/text-type/rincon/">{{ __('ver todos', 'sage') }}</a>
  </div>

  <div class="contenido">
    @query($args_rincon)
    @posts
      <div class="entry-header">
        <h2 class="entry-title">
          <a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
        </h2>
        <p class="byline author vcard">
            <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
              {{ get_the_author() }}
            </a>
          </p>
      </div>
      @if (has_excerpt())
      <div class="entry-summary">
          @wpautop(get_the_excerpt())
      </div>
      @endif
    @endposts
  </div>
</section>


<section class="noticias">
  <div class="header">
    <h1>{{ __('Noticias', 'sage') }}</h1>
    <a class="enlace" href="{{ $site_url }}/news">{{ __('ver todas las noticias', 'sage') }}</a>
    <a class="enlace"
      href="{{ $site_url }}/new-categories/superbia-juridico/">{{ __('Superbia Jurídico en los medios', 'sage') }}</a>
  </div>

  <div class="contenido">
    @query($args_news)
    @posts
      @include('partials.content-'.get_post_type())
    @endposts
  </div>
</section>

@endsection
