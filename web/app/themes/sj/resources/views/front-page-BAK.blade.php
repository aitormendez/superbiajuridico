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
      <p>{{ __('Derecho de familia, derecho penal y derecho bancario', 'sage') }}</p>
      <p>{{ __('Nuestra experiencia nos avala', 'sage') }}</p>
    </div>
  </div>
  <div class="marco pregunta">
    <div class="pregunta">
      <a href="{{ $contact_link }}">{{ __('Pregúntanos', 'sage') }}</a>
    </div>
  </div>
</section>

<section class="slider-container">
    <div class="owl-carousel">
        @query($args_glide)
        @posts
          @include('partials.content-glide')
        @endposts
    </div>
    <div class="owl-nav"></div>
</section>



<section class="slider">
    <div class="glide">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          <li class="glide__slide">0</li>
          <li class="glide__slide">1</li>
          <li class="glide__slide">2</li>
        </ul>
      </div>
      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
      </div>
    </div>
</section>

<section class="textos">
  <div id="hola" class="fas fa-arrow-alt-down"></div>
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
