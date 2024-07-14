<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      問い合わせ内容
    </h2>
  </x-slot>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('admin-inquiry-detail',$inquiry) }}
    </div>
  </x-slot>

  <div class="mx-auto py-6 max-w-5xl sm:px-6 lg:px-8">
    <div class="rounded bg-white py-4">
      <div class="px-6 pt-4">
        <div class="mb-6">
          <label class="mb-2 block text-sm font-medium"
            for="name">お問い合わせ日時</label>
          <input id="name"
            class="mb-2 block w-96 max-w-full rounded border px-4 py-3 text-sm text-gray-500"
            type="text" disabled value="{{ $inquiry->updated_at }}">
        </div>

        <div class="mb-6">
          <label class="mb-2 block text-sm font-medium"
            for="name">お名前</label>
          <input id="name"
            class="mb-2 block w-96 max-w-full rounded border px-4 py-3 text-sm text-gray-500"
            type="text" disabled value="{{ $inquiry->name }}">
        </div>

        <div class="mb-6">
          <label class="mb-2 block text-sm font-medium"
            for="name_kana">お名前（フリガナ）</label>
          <input id="name_kana"
            class="mb-2 block w-96 max-w-full rounded border px-4 py-3 text-sm text-gray-500"
            type="text" disabled value="{{ $inquiry->name_kana }}">
        </div>

        <div class="mb-6">
          <label class="mb-2 block text-sm font-medium"
            for="phone">電話番号</label>
          <input id="phone"
            class="mb-2 block w-96 max-w-full rounded border px-4 py-3 text-sm text-gray-500"
            type="text" disabled value="{{ $inquiry->tel }}">
        </div>

        <div class="mb-6">
          <label class="mb-2 block text-sm font-medium"
            for="email">メールアドレス</label>
          <input id="email"
            class="mb-2 block w-96 max-w-full rounded border px-4 py-3 text-sm text-gray-500"
            type="email" disabled value="{{ $inquiry->email }}">
        </div>

        <div class="mb-6">
          <label class="mb-2 block text-sm font-medium"
            for="body">本文</label>
          <textarea id="body"
            class="mb-2 block w-full rounded border px-4 py-3 text-sm text-gray-500"
            name="field-name" rows="5" disabled>{{ $inquiry->body }}</textarea>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
