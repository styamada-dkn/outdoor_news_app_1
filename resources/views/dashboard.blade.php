<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('admin-home') }}
    </div>
  </x-slot>

  <div class="mt-8">
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
      <p class="px-4 text-base font-semibold md:text-lg">
        {{ Auth::user()->nickname }}
        さんの投稿記事一覧
      </p>
    </div>
  </div>

  <div class="mt-2 text-right">
    <div class="m-auto max-w-5xl sm:px-6 lg:px-8">
      <div class="inline-block">
        <div
          class="cursor-pointer rounded bg-slate-600 px-2 py-2 text-xs text-white shadow-md hover:opacity-70 md:px-4">
          <a href="{{ route('admin.blog.create') }}" class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
              width="18" height="18">
              <path
                d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"
                fill="#ffffff" />
            </svg>
            <span class="pl-2">新規投稿</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="py-12">
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
      <div class="overflow-x-auto px-4 pt-4">
        <table class="w-full table-auto">
          <thead>
            <tr class="text-left text-sm text-gray-500">
              <th class="text-center font-medium">タイトル</th>
              <th class="font-medium">投稿日</th>
              <th class="font-medium">カテゴリ</th>
              <th class="font-medium">投稿者</th>
              <th class="font-medium">更新日時</th>
              <th class="font-medium">編集／削除</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($blogs as $blog)
              <tr @class(['text-sm', 'bg-gray-50' => $loop->odd])>
                <td class="flex items-center px-4 py-3">
                  <img class="mr-4 h-12 w-12 rounded-md object-cover"
                    src="{{ ($blog->image) ? asset('storage/' . $blog->image) : asset('/images/admin/noimage.jpg') }}"
                    alt="">
                  <p class="text-sm">
                    <a href="#">{{ $blog->title }}</a>
                  </p>
                </td>
                <td class="ftext-sm">{{ $blog->news_date }}</td>
                <td class="text-sm">{{ $blog->category->name }}</td>
                <td class="text-sm">{{ $blog->user->nickname }}</td>
                <td class="text-sm">{{ $blog->updated_at }}</td>
                <td>
                  <div class="flex">
                    <a class="mr-2" href="{{ route('admin.blog.edit', ['blog' => $blog]) }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18"
                        height="18" viewBox="0 0 512 512" fill="none">
                        <path
                          d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"
                          fill="#382CDD" />
                      </svg>
                    </a>
                   
                    @livewire('modal',['blog'=> $blog,'form_type' => "blog"])
                  </div>
                </td>
              </tr>
            @empty
              <tr class="mb-3">
                <td class="text-blue-500">投稿データはありません</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div>
          {{-- ページネーション --}}
          {{ $blogs->appends(request()->query())->onEachSide(2)->links() }}
        </div>
      </div>
    </div>
</x-app-layout>
