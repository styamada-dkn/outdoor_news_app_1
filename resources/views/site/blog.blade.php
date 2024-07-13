<x-page-layout>
  <x-slot name="breadcrumbs">
  </x-slot>

  <div class="py-10">
    <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
      <div class="flex items-start justify-center gap-x-4">
        <div class="">
          @forelse ($blogs as $blog)
            <div class="mb-3">
              @if ($blog->image)
                <x-card-container :href="route('blog.detail', ['blog' => $blog])" :imgPath="$blog->image"
                  :newsDate="$blog->news_date" :categoryName="$blog->category->name" :title="$blog->title"
                  :body="$blog->body" />
              @else
                <x-card-container :href="route('blog.detail', ['blog' => $blog])" :newsDate="$blog->news_date"
                  :categoryName="$blog->category->name" :title="$blog->title" :body="$blog->body" />
              @endif
            </div>
          @empty
            <div class="mb-3">
              <p class="text-blue-500">投稿データはありません</p>
            </div>
          @endforelse
        </div>
        <div class="hidden md:block">
          <div class="">
            <div
              class="mb-2 rounded bg-white p-2 text-center ring-1 ring-slate-500">
              <h2 class="inline-block font-semibold">おすすめの記事</h2>
            </div>

            @forelse ($recommendItems as $item)
              <a href="{{ route('blog.detail', ['blog' => $item]) }}"
                class="mb-2 block rounded bg-white p-1 hover:opacity-70">
                <div class="max-w-48 flex flex-col">
                  <img
                    src ="{{ $item->image ? asset('storage/' . $item->image) : asset('/images/admin/noimage.jpg') }}" />
                  <p class="line-clamp-2 text-left text-sm">
                    {{ $item->title }}
                  </p>
                </div>
              </a>
            @empty
              <div>
                <p>投稿はありません</p>
              </div>
            @endforelse

          </div>
        </div>
      </div>

      <div>
        {{-- ページネーション --}}
        {{ $blogs->appends(request()->query())->onEachSide(2)->links() }}
      </div>
    </div>
  </div>

</x-page-layout>
