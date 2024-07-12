<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      問い合わせ一覧
    </h2>
  </x-slot>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('admin-inquiry') }}
    </div>
  </x-slot>

  <div class="pb-12 pt-6">
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
      <div class="overflow-x-auto px-4 pt-4">
        <table class="w-full table-auto">
          <thead>
            <tr class="text-left text-sm text-gray-500">
              <th class="text-center font-medium">お名前</th>
              <th class="font-medium">お名前（カナ）</th>
              <th class="font-medium">電話番号</th>
              <th class="font-medium">メール</th>
              <th class="font-medium">日時</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($inquiries as $inquiry)
              <tr @class(['text-sm', 'bg-gray-50' => $loop->odd])>
                <td class="px-4 py-3">
                  <p class="class= text-sm underline cursor-pointer text-blue-500 hover:opacity-70">
                    <a
                      href="{{ route('contact.inquiry.detail', ['inquiry' => $inquiry]) }}">
                      {{ $inquiry->name }}
                    </a>
                  </p>
                </td>
                <td class="ftext-sm">{{ $inquiry->name_kana }}</td>
                <td class="ftext-sm">{{ $inquiry->tel }}</td>
                <td class="text-sm">{{ $inquiry->email }}</td>
                <td class="text-sm">{{ $inquiry->updated_at }}</td>
              </tr>
            @empty
              <tr class="mb-3">
                <td class="text-blue-500">問い合わせはありません</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div>
          {{-- ページネーション --}}
          {{ $inquiries->appends(request()->query())->onEachSide(2)->links() }}
        </div>
      </div>
    </div>
</x-app-layout>
