<article @php post_class('infinite-scroll-item') @endphp>
  <header>
    @if (! is_tax())
      <div class="tipo-de-texto">
        @php
        $terms = get_the_terms($post->ID, 'article-type');
        $output = '';
        $text_type_url = get_bloginfo('url') . '/article-types/';
        foreach ($terms as $term) {
            $output .= '<a href="' . $text_type_url . $term->slug . '">' . $term->name . '</a>';
        }
        @endphp
        {!! $output !!}
      </div>
    @endif
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
