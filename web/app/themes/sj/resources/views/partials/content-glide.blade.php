<li class="glide__slide">
    <a href="{{ get_permalink() }}">{!! get_the_title() !!}
    <h1>
        {{ get_post_type()}}
    </h1>
    <h2 class="entry-title">
      {!! get_the_title() !!}
    </h2>

    @if (has_post_thumbnail())
    <div class="img">
      @thumbnail('glide-1500')
    </div>
    @endif
  </a>
</li>
