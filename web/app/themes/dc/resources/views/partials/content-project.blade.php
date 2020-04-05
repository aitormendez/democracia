<article class="card">
  <div class="card-header" id="heading-{{ $post->ID }}">
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    <button data-toggle="collapse" data-target="#collapse-{{ $post->ID }}" aria-expanded="true" aria-controls="collapse-{{ $post->ID }}">
      <i class="fas fa-caret-right"></i>
    </button>
    <button><i class="fad fa-arrow-alt-right"></i></button>
  </div>


    <div id="collapse-{{ $post->ID }}" class="collapse" aria-labelledby="heading-{{ $post->ID }}" data-parent="#accordionProjects">
      <div class="card-body">
        <div class="ficha">
          <p>
            {{ ArchiveProject::anio() }}
          </p>
          <p>
            {!! ArchiveProject::formatos() !!}
          </p>
          @field('ficha')
        </div>
      </div>
    </div>


</article>



