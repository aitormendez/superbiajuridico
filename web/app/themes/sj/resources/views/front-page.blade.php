@extends('layouts.app')

@section('content')

  <section id="slide01" class="hero">

    <div class="bcg">
      @php
        echo wp_get_attachment_image( $img_uno_id, 'very-large' );
      @endphp
    </div>

    <div class="escudo">
      @svg('sj-escudo-blanco')
    </div>

    <div class="marco texto">
      <div class="texto">
        <p><span>En <strong>Superbia Jurídico</strong></span> <span>nos especializamos en derecho de familia</span> <span>y derecho penal.</span></p>
        <p>Nuestra amplia trayectoria nos avala.</p>
      </div>
    </div>
    <div class="marco pregunta">
      <div class="pregunta">
        <a href="contacto">Pregúntanos</a>
      </div>
    </div>
  </section>

  <section class="textos">
    <section class="articulos">
      <div class="header">
        <h1>{{ __('Últimos artículos', 'sage') }}</h1>
        <a class="enlace" href="{{ $site_url }}article-types/articulo/">{{ __('Ver todos', 'sage') }}</a>
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
        <a class="enlace" href="{{ $site_url }}article-types/comentario/">{{ __('Ver todas', 'sage') }}</a>
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
        <a class="enlace" href="{{ $site_url }}article-types/resumen/">{{ __('Ver todos', 'sage') }}</a>
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
      <h1>{{ __('News', 'sage') }}</h1>
      <a class="enlace" href="{{ $site_url }}/news">{{ __('See All News', 'sage') }}</a>
      <a class="enlace" href="{{ $site_url }}/new-categories/superbia-juridico/">{{ __('Superbia Jurídico in the media', 'sage') }}</a>
    </div>

    <div class="contenido">
      @query($args_news)
      @posts
       @include('partials.content-'.get_post_type())
      @endposts
    </div>
  </section>

@endsection
