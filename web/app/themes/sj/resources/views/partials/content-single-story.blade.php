<article>
      <header class="mx-4 mx-md-0 mt-5 mb-4">
        <h1 class="entry-title mb-4">{!! get_the_title() !!}</h1>
        @include('partials/entry-meta')
      </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
</article>
