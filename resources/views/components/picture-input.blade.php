@props([
    'type' => '',
    'imgSrc' => '',
])

@php
  switch ($type) {
      case 'blog':
          $title = 'ニュース投稿画像';
          $imgClasses = 'w-64 shadow-md';
          $imgSrc = $imgSrc
              ? asset('storage/' . $imgSrc)
              : asset('/images/admin/noimage.jpg');
          break;
      case 'profile':
          $title = 'プロフィール画像';
          $imgClasses = 'w-32 rounded-full shadow-md';
          $imgSrc = isset(Auth::user()->image)
              ? asset('storage/' . Auth::user()->image)
              : asset('/images/admin/noimage.jpg');
          break;
      default:
          $title = '';
          $imgClasses = '';
          break;
  }
@endphp

<div class="mb-6">
  <label class="mb-2 block text-sm font-medium"
    for="image">{{ $title }}</label>
  <div class="flex flex-col items-center md:flex-row md:items-end">
    <img id="previewImage" src="{{ $imgSrc }}"
      data-noimage="{{ asset("storage/" . $imgSrc ) }}" alt=""
      class={{ $imgClasses }}>
    <input id="image" class="mb-2 block w-full px-4 py-3" type="file"
      accept='image/*' name="image">
  </div>
  <script>
    // 画像プレビュー
    document.getElementById('image').addEventListener('change', e => {
      const previewImageNode = document.getElementById('previewImage')
      const fileReader = new FileReader()
      fileReader.onload = () => previewImageNode.src = fileReader.result
      if (e.target.files.length > 0) {
        fileReader.readAsDataURL(e.target.files[0])
      } else {
        previewImageNode.src = previewImageNode.dataset.noimage
      }
    })
  </script>
</div>
