@props([
    'message' => '',
    'type' => 'success',
])

@php
  switch ($type) {
      case 'success':
          $addClass = 'border-green-500';
          $fillClass = 'fill-green-500';
          break;
      case 'info':
          $addClass = 'border-blue-200';
          $fillClass = 'fill-blue-200';
          break;
      case 'alert':
          $addClass = 'border-red-500';
          $fillClass = 'fill-red-500';
          break;
      default:
          $addClass = 'border-green-500';
          $fillClass = 'fill-green-500';
          break;
  }
@endphp

<div class="mt-4 text-right">
  <div id='popupMessage'
    class="{{ $addClass }} ml-auto inline-block rounded-r-lg border-l-4 bg-white py-4 pl-6 pr-16 shadow-md">
    <div class="flex items-center cursor-pointer">
      <span class="mr-2 inline-block">
        <svg width="20" height="20" viewBox="0 0 20 20"
          class="{{ $fillClass }}" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM14.2 8.3L9.4 13.1C9 13.5 8.4 13.5 8 13.1L5.8 10.9C5.4 10.5 5.4 9.9 5.8 9.5C6.2 9.1 6.8 9.1 7.2 9.5L8.7 11L12.8 6.9C13.2 6.5 13.8 6.5 14.2 6.9C14.6 7.3 14.6 7.9 14.2 8.3Z">
          </path>
        </svg>
      </span>
      <p class="font-medium text-green-800">{{ $message }}</p>
    </div>
  </div>
  <script>
    // ポップアップを消す
    var elem = document.getElementById('popupMessage');
    elem.addEventListener('click', function() {
      setTimeout(() => {
        elem.style.display = 'none';
      }, 500);
    }, false);
  </script>
</div>
