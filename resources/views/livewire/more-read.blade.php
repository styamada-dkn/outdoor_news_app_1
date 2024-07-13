<section>
  @forelse ($blogs as $blog)
    <div class="mb-3">
      @if ($blog->image)
        <x-card-container :href="route('blog.detail', ['blog' => $blog])" :imgPath="$blog->image" :newsDate="$blog->news_date"
          :categoryName="$blog->category->name" :title="$blog->title" :body="$blog->body" />
      @else
        <x-card-container :href="route('blog.detail', ['blog' => $blog])" :newsDate="$blog->news_date" :categoryName="$blog->category->name"
          :title="$blog->title" :body="$blog->body" />
      @endif
    </div>
  @empty
    <div class="mb-3">
      <p class="text-blue-500">投稿データはありません</p>
    </div>
  @endforelse

  <div wire:loading.flex class="flex h-full items-center justify-center"
    aria-label="読み込み中">
    <div
      class="h-10 w-10 animate-spin rounded-full border-4 border-blue-500 border-t-transparent">
    </div>
  </div>

  @if ($hasMorePages)
    <div class="mt-4 text-center md:mt-8">
      <button
        class="inline-block rounded border-2 border-solid border-blue-500 bg-white px-8 py-2 text-xs font-semibold leading-none hover:bg-blue-500 hover:text-white md:px-14 md:py-4 md:text-base"
        wire:click="fetchData">
        もっと見る
      </button>
    </div>
  @endif


</section>
