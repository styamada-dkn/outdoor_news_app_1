<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      ニュース登録
    </h2>
  </x-slot>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('admin-blog-create') }}
    </div>
  </x-slot>

  <div class="mt-4">
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
      <div class="rounded bg-white py-4">
        {{-- フォーム --}}
        <form action="{{ route('admin.blog.store') }}" method="post"
          enctype="multipart/form-data">
          @csrf
          <div class="flex justify-end border-b px-6 pb-4">
            <button type="submit"
              class="cursor-pointer rounded bg-slate-600 px-4 py-2 text-xs text-white shadow-md hover:opacity-70 md:px-6">
              保存
            </button>
          </div>

          <div class="px-6 pt-4">
            <!-- エラーメッセージ　-->
            @if ($errors->any())
              <div
                class="mb-8 rounded border border-yellow-300 bg-yellow-50 px-6 py-4">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li class="text-red-400">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="mb-6">
              <label class="mb-2 block text-sm font-medium"
                for="title">タイトル</label>
              <input id="title"
                class="mb-2 block w-full rounded border bg-white px-4 py-3 text-sm md:text-base"
                type="text" name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-6">
              <label class="mb-2 block text-sm font-medium"
                for="news_date">投稿日</label>
              <input id="news_date"
                class="mb-2 block w-64 rounded border bg-white px-4 py-3 text-sm md:text-base"
                type="date" name="news_date" value="{{ old('news_date') }}">
            </div>

            {{-- 投稿画像 --}}
            <div class="mb-6">
              <x-picture-input type="blog" />
            </div>

            <div class="mb-6">
              <label class="mb-2 block text-sm font-medium md:text-base"
                for="body">記事本文</label>
              <textarea id="body"
                class="mb-2 block w-full resize-none rounded border bg-white px-2 py-3 text-sm"
                name="body" rows="5">{{ old('body') }}</textarea>
            </div>

            <div class="mb-40">
              <label class="mb-2 block text-sm font-medium"
                for="category">カテゴリ</label>
              <div class="flex">
                <select id="category"
                  class="mb-2 block rounded border w-64 bg-white py-3 pl-4 pr-8 text-sm md:text-base"
                  name="category_id">
                  <option value="">選択してください</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected($category->id == old('category_id'))>
                        {{ $category->name }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

</x-app-layout>
