@extends('layouts.app')

@section('content')
        @while(have_posts()) @php the_post() @endphp
          @include('partials.page-header')
            <div class="container-fluid">
              <div class="row">
                <div class="caja my-5">
                  @include('partials.content-page')
                </div>
              </div>
            </div>
        @endwhile
@endsection
