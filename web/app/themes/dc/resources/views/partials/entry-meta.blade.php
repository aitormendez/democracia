<div class="meta">
    <time class="updated" datetime="{{ get_post_time('c', true) }}">
      @php
          printf( esc_html__( '%1s de %2s de %3s', 'sage' ), $fecha['dia'], $fecha['mes'], $fecha['anio'] )
      @endphp
    </time>
  @if (is_singular('project'))
    @field('ficha')
  @endif

</div>

