{{--
  Title: Vimeo video
  Description: Incrusta un video desde Vimeo
  Category: embed
  Icon: dashicons-video-alt3
  Keywords: video vimeo
  Mode: edit
  Align: center
  PostTypes: project
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
  EnqueueStyle: styles/block-vimeo.css
  EnqueueScript: scripts/block-vimeo.js
--}}


<div class="contenedor w-100 my-4 {{ $block['classes'] }}">
	<div class="un-video" data-plyr-provider="vimeo" data-plyr-embed-id="{{ get_field('vimeo_id') }}"></div>
</div>
