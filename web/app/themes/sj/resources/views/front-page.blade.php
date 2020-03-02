@extends('layouts.app')

@section('content')

<section id="hero">
  <div class="texto">
    {!! $hero_txt !!}
  </div>

  <a href="{{ $contact_link }}" class="preguntanos">{{ __('Pregúntanos', 'sage') }}</a>

  {!! $img_portada  !!}

  <a id="flecha-1"><i class="fas fa-arrow-circle-down"></i></a>

</section>

<section class="slider">
    <div class="container">
      <div class="row">
        <div class="glide">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                @query($args_glide)
                @php $count = $query->found_posts; @endphp
                @posts
                  @include('partials.content-glide')
                @endposts
            </ul>
          </div>

          <div class="glide__arrows d-none d-sm-block" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
              <i class="fas fa-arrow-left">
            </i></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
              <i class="fas fa-arrow-right"></i>
            </button>
          </div>

          <div class="glide__bullets d-none d-sm-block" data-glide-el="controls[nav]">
            @for ($i = 0; $i < $count; $i++)
          <button class="glide__bullet" data-glide-dir="={{ $i }}"></button>
            @endfor
          </div>

        </div>
      </div>
    </div>
</section>

<section class="textos">
  <div class="container">
    <div class="row">
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
    </div>
  </div>
</section>

@query($args_rincon)
@hasposts
<section class="rincon">
  <div class="container">
    <div class="row">
      <div class="header">
        <i class="fas fa-graduation-cap"></i>
        <h1>{{ __('Rincón del profesor', 'sage') }}</h1>
        <a class="enlace" href="{{ $site_url }}/text-type/rincon/">{{ __('ver todos', 'sage') }}</a>
      </div>
      <div class="contenido">
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
          <div class="entry-summary text-principal">
              @wpautop(get_the_excerpt())
          </div>
          @endif
        @endposts
      </div>
    </div>
  </div>
</section>
@endhasposts

<section class="noticias">
  <div class="container">
    <div class="row">
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
    </div>
  </div>
</section>
<div id="template" style="display: none;">
  <strong>{{ __('Superbia Jurídico en los medios', 'sage') }}</strong>
</div>

@endsection
