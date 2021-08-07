{{--
  Template Name: Contacto
--}}

@extends('layouts.app')

@section('content')
  <div class="container-fluid bg-n">
    <div class="row">
      <div class="formulario caja d-flex justify-content-center align-items-center">
        @while(have_posts()) @php the_post() @endphp
          @include('partials.content-page')
        @endwhile
      </div>
    </div>
  </div>
@endsection
