@extends('layouts.app')

@section('content')

  <section id="slide01" class="hero">

    <div class="bcg">
      <img src="{{ $img_portada[0]['url'] }}" alt="imagen portada" srcset="{{$img_portada[1] }}" >
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


  <section class="noticias">
    <div class="header">
      <h1>{{ __('Noticias', 'sage') }}</h1>
      <a class="enlace" href="{{ $site_url }}/news">{{ __('ver todas las noticias', 'sage') }}</a>
      <a class="enlace" href="{{ $site_url }}/new-categories/superbia-juridico/">{{ __('Superbia Jurídico en los medios', 'sage') }}</a>
    </div>

    <div class="contenido">
      @query($args_news)
      @posts
       @include('partials.content-'.get_post_type())
      @endposts
    </div>
  </section>

@endsection
