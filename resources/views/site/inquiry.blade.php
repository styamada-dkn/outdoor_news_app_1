<x-page-layout>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('inquiry') }}
    </div>
  </x-slot>

  <div class="py-10">
    <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">

      <section class="bg-gray-100">
        <div class="container mx-auto">
          <h1
            class="flex h-5 items-center justify-center p-3 text-lg font-bold md:h-10 md:p-6 md:text-2xl">
            お問い合わせフォーム
          </h1>
        </div>
      </section>

      <section class="mt-10 pb-24">
        <div class="mx-auto px-4">
          <p class="text-left text-sm md:text-base pl-0 md:pl-20">
            お客さまからのご質問をお問い合わせフォームにて受け付けております。<br />
            必要事項をご入力の上、「送信」を押してください。
          </p>
          <div class="mt-8">
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

            <form action="{{ route('inquiry') }}" method="post">
              @csrf

              <div class="mb-4">
                <label for="name"
                  class="my-1 block p-1 text-left text-sm font-medium md:text-base">
                  お名前
                  <span class="mx-2 bg-red-400 px-2 py-1 text-xs text-white">
                    必須
                  </span>
                </label>
                <input id="name"
                  class="w-full rounded border bg-neutral-50 p-2 text-sm leading-none outline-none md:p-4 md:text-base"
                  type="text" placeholder="例）山田太郎" name="name"
                  value="{{ old('name') }}">
                @if ($errors->has('name'))
                  <p class="text-red-400">{{ $errors->first('name') }}</p>
                @endif
              </div>
              <div class="mb-4">
                <label for=name_kana
                  class="my-1 block p-1 text-left text-sm font-medium md:text-base">
                  お名前（フリガナ）
                  <span class="mx-2 bg-red-400 px-2 py-1 text-xs text-white">
                    必須
                  </span>
                </label>
                <input id="name_kana"
                  class="w-full rounded border bg-neutral-50 p-2 text-sm leading-none outline-none md:p-4 md:text-base"
                  type="text" placeholder="例）ヤマダタロウ" name="name_kana"
                  value="{{ old('name_kana') }}">
                @error('name_kana')
                  <p class="text-red-400">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-4">
                <label for="tel"
                  class="my-1 block p-1 text-left text-sm font-medium md:text-base">
                  電話番号
                  <span class="mx-2 bg-red-400 px-2 py-1 text-xs text-white">
                    必須
                  </span>
                </label>
                <input id="tel"
                  class="w-full rounded border bg-neutral-50 p-2 text-sm leading-none outline-none md:p-4 md:text-base"
                  type="text" placeholder="例）0312345678" name="tel"
                  value="{{ old('tel') }}">
                @error('tel')
                  <p class="text-red-400">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-4">
                <label for="email"
                  class="my-1 block p-1 text-left text-sm font-medium md:text-base">
                  メールアドレス
                  <span class="mx-2 bg-red-400 px-2 py-1 text-xs text-white">
                    必須
                  </span>
                </label>
                <input id="email"
                  class="w-full rounded border bg-neutral-50 p-2 text-sm leading-none outline-none md:p-4 md:text-base"
                  type="email" placeholder="abc@example.com" name="email"
                  value="{{ old('email') }}">
                @error('email')
                  <p class="text-red-400">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-4">
                <label for="body"
                  class="my-1 block p-1 text-left text-sm font-medium md:text-base">
                  お問い合わせ内容
                  <span class="mx-2 bg-red-400 px-2 py-1 text-xs text-white">
                    必須
                  </span>
                </label>
                <textarea id="body"
                  class="h-24 w-full resize-none rounded border bg-neutral-50 p-2 text-sm leading-none outline-none md:p-4 md:text-base"
                  type="text" placeholder="お問い合わせ内容をご入力ください" name="body">{{ old('body') }}</textarea>
                @error('body')
                  <p class="text-red-400">{{ $message }}</p>
                @enderror
              </div>
              <div class="text-center text-sm md:text-base">
                <p>送信される際は、<a href="#"
                    class="text-blue-600 hover:underline">個人情報保護方針</a>に同意したものとします。
                </p>
                <button
                  class="mt-6 rounded bg-blue-600 px-8 py-4 text-sm font-semibold leading-none text-white hover:bg-blue-700 md:px-12 md:text-base"
                  type="submit">送信</button>
              </div>
            </form>
          </div>
        </div>
      </section>

    </div>
  </div>
</x-page-layout>
