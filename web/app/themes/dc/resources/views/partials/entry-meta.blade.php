@if (is_singular('project'))
  @php
    $fecha_pub_raw = new DateTime(get_field('fecha_proyecto', false, false ));
    $fecha_pub_iso = $fecha_pub_raw->format('c');
    $fecha_format = $fecha_pub_raw->format('Y');
    $unixtimestamp = strtotime( $fecha_pub_iso );
    $fecha_pub = date_i18n( "Y", $unixtimestamp );
  @endphp
@else
  @php
    $fecha_pub_iso = get_post_time('c', true);
    $fecha_pub = get_the_date();
  @endphp
@endif

<div class="meta">
    <time class="updated" datetime="{{ $fecha_pub_iso }}">{{ $fecha_pub }}</time>
    <p class="formatos mt-2">
      {!! $formatos_single_project !!}
    </p>
  @if (is_singular('project'))
    @field('ficha')
  @endif

</div>

