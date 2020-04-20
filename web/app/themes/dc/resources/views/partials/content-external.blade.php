<article {{ post_class() }}>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    @if (has_post_thumbnail())
      @thumbnail('large')
    @endif

  </header>
  @if (!is_tax('external_type', 'tv'))
    <div class="entry-summary">
      @php the_excerpt() @endphp
    </div>
  @endif

</article>
