<article {{ post_class() }}>
  <header>
    <div class="grupo">
      @if (ArchiveStory::getEnlaceExterno())
        <h2 class="entry-title"><a href="{{ ArchiveStory::getEnlaceExterno() }}" target="_blank">{!! get_the_title() !!}</a></h2>
      @else
        <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      @endif

      @if (is_post_type_archive('external'))
        <div class="entry-summary">
          @php the_content() @endphp
        </div>
      @endif
    </div>

    @if (has_post_thumbnail())
      @thumbnail('large')
    @endif

  </header>
</article>
