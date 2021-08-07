@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container-fluid">
    <div class="row">
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
  </div>
@endsection
