@php
  $fecha = [
    'dia'  => get_the_date('j'),
    'mes'  => get_the_date('F'),
    'anio' => get_the_date('Y'),
  ];
@endphp

<div class="container-fluid bg-white">
  <div class="row">
    <div class="caja py-1">
      <p class="fecha">
        <time class="updated text-g4" datetime="{{ get_post_time('c', true) }}">
          @php
              printf( esc_html__( '%1$s %2$s, %3$s', 'sage' ), $fecha['mes'], $fecha['dia'], $fecha['anio'] )
          @endphp
        </time>
      </p>
    </div>
  </div>
</div>


