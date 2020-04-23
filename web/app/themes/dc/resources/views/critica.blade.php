{{--
  Template Name: Crítica
--}}

@extends('layouts.app')

@section('content')

  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  @foreach ($terms as $term)

    @query([
      'post_type' => 'external',
      'nopaging' => true,
      'tax_query' => [
        [
          'taxonomy' => 'external_type',
          'field'    => 'slug',
          'terms'    => 'critica',
        ],
        [
          'taxonomy' => 'external_lang',
          'field'    => 'slug',
          'terms'    => $term,
        ]
      ]
    ])

    <div class="epi container-fluid my-4">
      <div class="row">
        <h2 class="caja">{{ $term->name }}</h2>
      </div>
    </div>
        <div class="cont container-fluid">
          <ul class="row">
            @posts
              <li class="caja">
                  <h3 class="entry-title my-0">@title</h3>
                  <div class="entry-content">
                    @content
                  </div>
              </li>
            @endposts
          </ul>
        </div>


  @endforeach

@endsection
