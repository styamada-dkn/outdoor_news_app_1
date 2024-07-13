@props([
    'href' => '',
    'imgPath' => '',
    'newsDate' => '',
    'categoryName' => '',
    'title' => '',
    'body' => '',
])

@php
    $imgPath = ($imgPath) ? asset('storage/' . $imgPath) : asset('/images/admin/noimage.jpg');
@endphp

<a href="{{ $href }}" class="hover:opacity-75 block max-w-lg">
  <div class="bg-white shadow-sm sm:rounded-lg w-full">
    <div class="flex items-start justify-center text-gray-900">
      <div class="max-w-44 m-2 md:m-5">
        <img src="{{ $imgPath }}" alt=""
          class="h-auto w-full object-cover shadow-md" />
      </div>
      <div class="flex flex-col justify-start">
        <div class="mt-2 flex items-center justify-between px-2 md:mt-4 md:px-4">
          <span class="text-sm">{{ $newsDate }}</span>
          <span class="bg-slate-200 p-1 text-xs">{{ $categoryName }}</span>
        </div>
        <div class="mt-1 px-2 md:mt-2 md:px-4">
          <h2
            class="text-left text-sm font-semibold line-clamp-2 leading-snug md:text-base md:leading-relaxed">
            {{ $title }}
          </h2>
          <p
            class="mb-1 mt-1 line-clamp-2 text-left text-sm text-gray-500 md:mb-2 md:mt-2">
            {{ $body }}
          </p>
        </div>
      </div>
    </div>
  </div>
</a>
