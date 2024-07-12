<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      ユーザ一覧
    </h2>
  </x-slot>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('users') }}
    </div>
  </x-slot>

  <div class="mt-2 text-right">
    <div class="m-auto max-w-5xl sm:px-6 lg:px-8">
      <div class="inline-block px-2">
        <div class="flex items-center gap-x-4">
          <div
            class="cursor-pointer rounded bg-slate-600 px-4 py-2 text-xs text-white shadow-md hover:opacity-70 md:px-6">
            <a href="{{ route('register') }}" class="flex">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                width="18" height="18">
                <path
                  d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"
                  fill="#ffffff" />
              </svg>
              <span class="pl-2">ユーザ追加</span>
            </a>
          </div>
          <div
            class="cursor-pointer rounded bg-blue-500 px-2 py-2 text-xs text-white shadow-md hover:opacity-70 md:px-4">
            <a href="{{ route('profile.edit') }}" class="flex">
              <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"
                width="18" height="18">
                <path
                  d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"
                  fill="#ffffff" />
                <span class="pl-2">アカウント編集</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="pb-12 pt-6">
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
      <div class="overflow-x-auto px-4 pt-4">
        <table class="w-full table-auto">
          <thead>
            <tr class="text-left text-sm text-gray-500">
              <th class="text-center font-medium">ユーザ名</th>
              <th class="font-medium">ニックネーム</th>
              <th class="font-medium">メール</th>
              <th class="font-medium">更新日時</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
              <tr @class(['text-sm', 'bg-gray-50' => $loop->odd])>
                <td class="flex items-center px-4 py-3">
                  <img class="mr-4 h-12 w-12 rounded-md object-cover"
                    src="{{ $user->image ? asset('storage/' . $user->image) : asset('/images/admin/noimage.jpg') }}"
                    alt="">
                  <p class="text-sm">
                    {{ $user->name }}
                  </p>
                </td>
                <td class="ftext-sm">{{ $user->nickname }}</td>
                <td class="text-sm">{{ $user->email }}</td>
                <td class="text-sm">{{ $user->updated_at }}</td>
              </tr>
            @empty
              <tr class="mb-3">
                <td class="text-blue-500">ユーザは登録されていません</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div>
          {{-- ページネーション --}}
          {{ $users->appends(request()->query())->onEachSide(2)->links() }}
        </div>
      </div>
    </div>
</x-app-layout>
