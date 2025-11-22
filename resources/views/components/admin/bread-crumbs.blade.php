@props(['items'])

<ol class="breadcrumb float-sm-end">
  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
  @foreach ($items as $item)
    @if(isset($item['url']))
      <li class="breadcrumb-item">
        <a href="{{ $item['url'] }}">
          {{ $item['label'] }}
        </a>
      </li>
    @else
      <li class="breadcrumb-item active" aria-current="page">{{ $item['label'] }}</li>
    @endif
  @endforeach
</ol>