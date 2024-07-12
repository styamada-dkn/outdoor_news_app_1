<x-page-layout>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('blog', $blog) }}
    </div>
  </x-slot>

  <div class="py-10">

    <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
      <section class="bg-gray-50 pt-2">
        <div class="container mx-auto rounded shadow">
          <h1
            class="mt-2 flex h-10 items-center justify-center p-6 text-lg font-bold md:h-20 md:p-12 md:text-2xl">
            {{ $blog->title }}
          </h1>
        </div>
      </section>

      <section>
        <div class="mx-auto px-2">
          <div class="my-8 border-b pb-4">
            <p class="text-left text-base md:text-lg">投稿日 /
              {{ $blog->news_date }}</p>
            <p class="text-left text-base md:text-lg">投稿者 /
              {{ $blog->user->nickname }}</p>
            <p class="text-left text-base md:text-lg">カテゴリ /
              {{ $blog->category->name }}</p>
          </div>
          {{-- 画像 --}}
          <div>
            <img class="mx-auto mb-12 rounded object-cover"
              src="{{ ($blog->image) ? asset('storage/' . $blog->image) : asset('/images/admin/noimage.jpg') }}"
              alt="">
          </div>
          {{-- 本文 --}}
          <p class="leading-normal text-gray-500 md:leading-loose">
            {{ $blog->body }}
          </p>
        </div>
      </section>

      <section class="mt-8 pb-12 md:mt-16 md:pb-24">
        <div class="flex flex-col items-center">
          <h3
            class="mb-4 text-lg font-medium leading-tight md:text-xl">
            同じカテゴリーの記事
          </h3>

          @livewire('more-read',['myBlog_id'=> $blog->id,'category_id' => $blog->category->id])

        </div>
      </section>

    </div>

  </div>

</x-page-layout>
