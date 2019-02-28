<article>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>
  @if (has_excerpt())
    <div class="excerpt">
      <h2>En breve</h2>
      {{ the_excerpt() }}
    </div>
  @endif
  <div class="entry-content">
    @php the_content() @endphp
  </div>
</article>
