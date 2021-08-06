<article class="article">
  <header id="heading-{{ get_the_ID() }}">
    <div class="container-fluid">
      <div class="row px-sm-0">
        <div class="col-md-8 offset-md-2 d-flex align-items-center">
          <h2 class="entry-title d-flex align-items-center mb-0 mr-3">
            <a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
          </h2>
          <button class="btn-desplegar collapsed d-flex align-items-center" data-toggle="collapse" data-target="#collapse-{{ get_the_ID() }}" aria-expanded="false" aria-controls="collapse-{{ $post->ID }}">
            <i class="fas fa-caret-right"></i>
          </button>
          <a class="permalink d-flex justify-content-center" href="{{ get_permalink() }}"><i class="fad fa-arrow-alt-right"></i></a>
        </div>
      </div>
    </div>
  </header>


    <div id="collapse-{{ get_the_ID() }}" class="despliegue collapse bg-b" aria-labelledby="heading-{{ $post->ID }}" data-parent="#accordionProjects">
      <div class="container-fluid">
        <div class="row">
          <div class="wrapper col-md-8 offset-md-2">
            <div class="meta my-3">
              <p class="fecha">
                {{ ArchiveProject::anio() }}
              </p>
              <p class="formatos">
                {!! ArchiveProject::formatos() !!}
              </p>
              <div class="ficha">
                @field('ficha')
              </div>
            </div>
            <div class="thumb">
              @if (has_post_thumbnail())
               @thumbnail('full')
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>


</article>

