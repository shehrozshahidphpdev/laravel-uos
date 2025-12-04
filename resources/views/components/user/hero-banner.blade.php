@props(['title', 'navigation', 'banner', 'slugTitle'])
<section class="hero__banner" style="background-image: url('{{ asset('storage/admin/uploads/' . $banner->banner)}}')">
  <div class="container">
    <h1 class="title">
      {{ $banner->title ?? 'Title Goes Here'}}
    </h1>
  </div>
</section>
<div class="breadcrumbs">
  <ul>
    <li><a href="{{ route('user.home') }}">Home</a></li>
    <li>{{ $navigation }}</li>
  </ul>
</div>