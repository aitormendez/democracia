@extends('layouts.app')

@section('content')

<section class="hero d-flex">
  @if ($hero_tipo == 'video')
    <div class="plyr__video-embed w-100" id="player">
      <iframe
          src="https://player.vimeo.com/video/@option('hero_video')?loop=false&amp;title=false&amp;gesture=media"
          allowfullscreen
          allowtransparency
      ></iframe>
    </div>
  @endif
  @if ($hero_tipo == 'imagen')
    <div class="portrait justify-content-center align-items-center">
      {!! $img_vert_portada  !!}
    </div>
    <div class="landscape justify-content-center align-items-center">
      {!! $img_horiz_portada  !!}
    </div>
  @endif
</section>

@endsection
