<article {{ post_class() }}>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    @include('partials/entry-meta')
    @if (has_post_thumbnail())
      @thumbnail('large')
    @endif

  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
