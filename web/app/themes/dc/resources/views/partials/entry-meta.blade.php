<div class="meta">
    <time class="updated" datetime="{{ get_post_time('c', true) }}">
      @php
          printf( esc_html__( '%2s %1s, %3s', 'sage' ), $fecha['dia'], $fecha['mes'], $fecha['anio'] )
      @endphp
    </time>
  @if (is_singular('project'))
    @field('ficha')
  @endif

</div>

