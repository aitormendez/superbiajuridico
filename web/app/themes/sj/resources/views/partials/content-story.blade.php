<article {{ post_class(ArchiveStory::setClassNews()) }}>
  <header>

    @if (ArchiveStory::setClassNews() == 'infinite-scroll-item sj')
      <a href="{{ get_bloginfo( 'url' ) . '/news-category/superbia-juridico/'}}" class="marca-sj">
        @svg('sj-sj')
      </a>
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
