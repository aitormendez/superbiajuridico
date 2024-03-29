<article {{ post_class(ArchiveStory::setClassNews()) }}>
  <header>
    @if (ArchiveStory::setClassNews() == 'infinite-scroll-item sj my-3')

    

      @if (isset($datos))
          @if (in_array($datos['this_trid'], $datos['trids']))
            @if ($despacho == 'superbia' && !is_tax('newsletter-category', 'publicar'))
              <a href="{{ get_bloginfo( 'url' ) . '/news-category/quercus-juridico/'}}" class="marca marca-qj">
                @svg('qj-logo-anagrama')
              </a>
            @elseif($despacho == 'quercus' && !is_tax('newsletter-category', 'publicar'))
              <a href="{{ get_bloginfo( 'url' ) . '/news-category/superbia-juridico/'}}" class="marca marca-sj">
                @svg('sj-logo-anagrama')
              </a>
            @endif
          @endif
      @else
        @if ($despacho == 'superbia' && !is_tax('newsletter-category', 'publicar'))
          <a href="{{ get_bloginfo( 'url' ) . '/news-category/superbia-juridico/'}}" class="marca marca-sj">
            @svg('sj-logo-anagrama')
          </a>
        @elseif($despacho == 'quercus' && !is_tax('newsletter-category', 'publicar'))
          <a href="{{ get_bloginfo( 'url' ) . '/news-category/quercus-juridico/'}}" class="marca marca-qj">
            @svg('qj-logo-anagrama')
          </a>
        @endif
      @endif



    @endif

    @if (ArchiveStory::getEnlaceExterno())
      <h2 class="entry-title"><a href="{{ ArchiveStory::getEnlaceExterno()['url'] }}" target="_blank">{!! get_the_title() !!}</a></h2>
    @else
      <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    @endif

    @include('partials/entry-meta')
  </header>

  @php $extracto = get_the_excerpt() @endphp

  @if ($extracto != '')
    <div class="entry-summary">
      {{ $extracto }}
    </div>
  @endif
</article>
