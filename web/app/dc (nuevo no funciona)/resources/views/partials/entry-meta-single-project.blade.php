@php
  $fecha_pub_raw = new DateTime(get_field('fecha_proyecto', false, false ));
  $fecha_pub_iso = $fecha_pub_raw->format('c');
  $fecha_format = $fecha_pub_raw->format('Y');
  $unixtimestamp = strtotime( $fecha_pub_iso );
  $fecha_pub = date_i18n( "Y", $unixtimestamp );
@endphp


<div class="container-fluid">
  <div class="row">
    <div class="caja">
      <button class="mb-3" type="button" data-toggle="collapse" data-target="#collapseFicha" aria-expanded="false" aria-controls="collapseFicha">
        info
      </button>
    </div>
  </div>
</div>

<div class="container-fluid collapse bg-white" id="collapseFicha">
  <div class="row">
    <div class="caja py-3">
      <p class="fecha">
        <time datetime="{{ $fecha_pub_iso }}">{{ $fecha_pub }}</time>
      </p>
      <p class="formatos mt-2">
        {!! $formatos_single_project !!}
      </p>
      @field('ficha')
    </div>
  </div>
</div>


