<x-page-layout>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('info') }}
    </div>
  </x-slot>

  <div class="py-10">
    <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
      <div class="overflow-auto">
        <div class="px-5 leading-relaxed md:px-5">
          <h2 class="mt-4 text-base font-semibold md:text-xl">
            このサイトは、アウトドア記事投稿サイト「
            {{ config('app.name') }}
            」の<span class="text-pink-500">デモサイト</span>です。
          </h2>
          <p class="mt-8">個人的なポートフォリオサイトとして作成したものであり、
            <span class="underline">一般的なWEBサービスを提供するものではありません。</span>
          </p>
          <p>登録したデータや画像などは一方的にサイト作成者によって変更、削除される場合があります。</p>
          <p>趣旨をご理解の上、ご利用ください。</p>

          <p>尚、当サイトは以下の様な機能を備えています。</p>
          <ul class="mt-4 list-disc pl-5">
            <li>アウトドア記事閲覧</li>
            <li>同カテゴリー記事自動表示</li>
            <li>ページネーション</li>
            <li>カテゴリー検索</li>
            <li>お問い合わせ</li>
            <li>【管理者機能】ログイン認証</li>
            <li>【管理者機能】投稿者の記事一覧（管理者トップページ）</li>
            <li>【管理者機能】アカウント情報（新規・修正・削除）</li>
            <li>【管理者機能】アウトドア記事投稿（新規・修正・削除）</li>
            <li>【管理者機能】お問い合わせ一覧（閲覧）</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</x-page-layout>
