@props([
  'method' => 'POST',
  'action' => '#',
  'media' => false,
  'id' => '#'
])



<form
  action="{{ $action }}"
  method="{{ in_array($method, ['GET', 'POST']) ? $method : 'POST' }}"
@if($media) enctype="multipart/form-data" @endif
 id="{{ $id }}">
  @csrf

  @if(!in_array($method, ['GET', 'POST']))
    @method($method)
  @endif

  {{ $slot }}
</form>
