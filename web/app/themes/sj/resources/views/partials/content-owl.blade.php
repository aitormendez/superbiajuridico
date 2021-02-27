<article class="item mb-3">
    <h2 class="entry-title">
      <a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
    </h2>
    <div class="autores">
      @php
        $autores = ArchiveText::losAutoresLoop();
      @endphp
      @foreach ($autores as $autor)
        <p class="byline author vcard fn" rel="author">
          {{ $autor['nombre'] }}
        </p>
      @endforeach
    </div>
    <div class="extracto">
      @excerpt
    </div>
</article>
