<x-page-layout>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('inquiry-complete') }}
    </div>
  </x-slot>

  <div class="py-10">
    <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">

      <section class="bg-gray-100 pt-2">
        <div class="container mx-auto">
          <h1
            class="flex h-5 items-center justify-center p-3 text-lg font-bold md:h-10 md:p-6 md:text-2xl">
            お問い合わせが完了しました</h1>
        </div>
      </section>

      <section class="mt-20 pb-40 md:pb-60">
        <div class="container mx-auto px-4 text-center">
          <p class="inline-block text-left text-sm md:text-base pl-5 md:pl-15">
            お問い合わせありがとうございました。<br>
            通常3営業日以内にご入力頂いたメールアドレスに返信させていただきます。 <br>
            恐れ入りますが、しばらくお待ちください。
          </p>

          <p class="pt-10">
            <a href="{{ route('home') }}" class="text-blue-600 hover:underline">
              トップページ
            </a>
            に戻る
          </p>
        </div>
      </section>
    </div>
  </div>
</x-page-layout>
