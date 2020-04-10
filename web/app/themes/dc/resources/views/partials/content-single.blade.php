<article class="bg-b">
    <header>

      <div class="container-fluid">
        <div class="row">
          <h1 class="caja entry-title py-5">{!! get_the_title() !!}</h1>
        </div>
      </div>

      <div class="meta">
        @if (is_singular("project"))
          @include('partials/entry-meta-single-project')
        @else
          @include('partials/entry-meta')
        @endif
      </div>


    </header>
    <div class="container-fluid entry-content">
      <div class="row">
        @php the_content() @endphp
      </div>
    </div>
</article>
