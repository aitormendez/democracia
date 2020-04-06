<article class="card bg-n">
  <header id="heading-{{ get_the_ID() }}">
    <div class="container">
      <div class="row px-sm-0">
        <div class="col-md-10 offset-md-2 d-flex align-items-center">
          <h2 class="entry-title d-flex align-items-center font-weight-light mb-0 mr-3"><a class="text-b" href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
          <button data-toggle="collapse" data-target="#collapse-{{ get_the_ID() }}" aria-expanded="false" aria-controls="collapse-{{ $post->ID }}">
            <i class="fas fa-caret-right"></i>
          </button>
          <a class="permalink d-block" href="{{ get_permalink() }}"><i class="fad fa-arrow-alt-right"></i></a>
        </div>
      </div>
    </div>
  </header>


    <div id="collapse-{{ get_the_ID() }}" class="collapse" aria-labelledby="heading-{{ $post->ID }}" data-parent="#accordionProjects">
      <div class="card-body">
        <div class="ficha bg-b">
          <p>
            {{ ArchiveProject::anio() }}
          </p>
          <p>
            {!! ArchiveProject::formatos() !!}
          </p>
          @field('ficha')
        </div>
        <div class="thumb bg-b">
          @if (has_post_thumbnail())
           @thumbnail('full')
          @endif
        </div>
      </div>
    </div>


</article>

