@php
  switch ($form_type) {
      case 'blog':
          $route = 'admin.blog.destroy';
          $value = ['blog' => $blog];
          break;
      case 'user':
          $route = 'admin.blog.destroy';
          $value = ['blog' => $blog];
          break;
      default:
          $route = 'admin.blog.destroy';
          $value = ['blog' => $blog];
          break;
  }
@endphp

<div>
  <button wire:click='openModal()'>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18"
      height="18" fill="none">
      <path
        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
        fill="#E85444" />
    </svg>
  </button>

  @if ($showModal)
    <form action="{{ route($route, $value) }}" method="post">
      @csrf
      @method('DELETE')
      <div class="fixed left-0 top-0 z-10 h-full w-full">
        <div
          class="z-20 flex h-full w-full flex-col items-center justify-center">
          <div class="h-36 w-80 rounded bg-slate-300 shadow bg-opacity-75">
            <div class="mt-10 px-3">
              <p class="text-sm font-semibold text-slate-800 md:text-base">
                削除を行いますが、本当によろしいでしょうか？
              </p>
            </div>
            <div class="mt-4 flex items-center justify-center">
              <button type='submit'
                class="cursor-pointer rounded bg-pink-300 px-7 py-2 font-semibold shadow hover:opacity-70">
                実行
              </button>
              <button wire:click='closeModal()' type="button"
                class="ml-4 cursor-pointer rounded bg-blue-300 px-4 py-2 shadow hover:opacity-70">
                キャンセル
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  @endif
</div>
