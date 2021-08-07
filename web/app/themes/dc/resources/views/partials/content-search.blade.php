<article class="container-fluid article bg-b my-1 py-3">
  <div class="row">
    <div class="caja">
      <header>
        <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
        @if (get_post_type() === 'post')
          @include('partials/entry-meta')
        @endif
      </header>
      <div class="entry-summary">
        @php the_excerpt() @endphp
      </div>
    </div>
  </div>
</article>
