<article {{ post_class() }}>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>
  <div class="entry-content">
    <ul>
      <li>Fecha: {{ $acf_fields['fecha_completa'] }}</li>
      <li><a href="{{ $acf_fields['pdf']['url'] }}" target="_blank">PDF local</a></li>
      @if ( $acf_fields['url_externa'] != '')
        <li><a href="{{ $acf_fields['url_externa'] }}" target="_blank">PDF en CENDOJ</a></li>
      @endif
      <li>
        @if (sizeof($articles) == 0)
            {{ __('Esta sentencia no está enlazada desde ningún artículo', 'sage') }}
        @elseif (sizeof($articles) == 1)
          {{ __('Esta sentencia está enlazada desde el artículo:', 'sage') }} :
        @elseif (sizeof($articles) > 1)
          {{ __('Esta sentencia está enlazada desde los artículos:', 'sage') }}
        @endif
        <ul>
          @foreach ($articles as $article)
            <li>
              <a href="{{ get_permalink($article->ID) }}">
                {{ $article->post_title}}
              </a>
            </li>
          @endforeach
        </ul>
      </li>


    </ul>
    @php

    @endphp
  </div>
</article>
