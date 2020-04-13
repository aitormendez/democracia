@php $class_except = (has_excerpt()) ? ' excerpt' : '' ; @endphp

<a role="article" href="{{ get_permalink() }}" {{ post_class('d-block my-3' . $class_except) }}>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 d-flex flex-wrap">

      <header>
        <h2 class="entry-title py-3 pr-md-3">
            {!! get_the_title() !!}
        </h2>
        @include('partials/entry-meta-story')
      </header>

      @if (has_post_thumbnail())
        <div class="thumb">
          @thumbnail('large')
        </div>
      @endif

      @if (has_excerpt())
        <div class="entry-summary py-3 pr-md-3">
          @wpautop(get_the_excerpt())
        </div>
      @endif

    </div>
    </div>
  </div>
</a>
