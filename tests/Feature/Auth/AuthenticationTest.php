<?php

namespace Tests\Feature\Auth;

use PHPUnit\Framework\Attributes\Test;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp():void
    {
        // 親のsetUpメソッド呼び出し
        parent::setUp();

        // ログイン用テストユーザ作成
        $this->user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),
        ]);
    }
    #[Test]
    public function ログイン画面の表示(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    #[Test]
    public function ログイン成功(): void
    {
        $response = $this->post('/login', [
            'email' => $this->user->email,
            'password' => '12345678',
        ]);
        // 認証されている
        $this->assertAuthenticated();
        // ログイン成功後に管理画面にリダイレクト
        $response->assertRedirect(route('dashboard', absolute: false));

        $this->get(route('dashboard'))
            ->assertSee('ログインしました');
    }

    #[Test]
    public function ログイン失敗(): void
    {
        // emailが不一致の場合
        $this->from('/login')
        ->post('/login', [
            'email' => 'emailtest@example.com',
            'password' => '12345678',
        ])
        ->assertRedirect(route('login'))
        ->assertInvalid(['email' => 'ログイン情報が存在しません。']);

       // emailが未入力の場合
       $this->from('/login')
       ->post('/login', [
           'email' => '',
           'password' => '12345678',
       ])
       ->assertRedirect(route('login'))
       ->assertInvalid(['email' => 'メールアドレスは必ず指定してください。']);

        // パスワードが不一致の場合
        $this->from('/login')
        ->post('/login', [
            'email' => $this->user->email,
            'password' => 'wrong-password',
        ])
        ->assertRedirect(route('login'))
        ->assertInvalid(['email' => 'ログイン情報が存在しません。']);

         // パスワードが未入力の場合
         $this->from('/login')
         ->post('/login', [
             'email' => $this->user->email,
             'password' => '',
         ])
         ->assertRedirect(route('login'))
         ->assertInvalid(['password' => 'パスワードは必ず指定してください。']);

        // 認証されていない
        $this->assertGuest();
    }

    #[Test]
    public function ログアウト(): void
    {
        $response = $this->actingAs($this->user)->post('/logout');

        // 認証されていない
        $this->assertGuest();
        // ログアウト後にログイン画面にリダイレクト
        $response->assertRedirect(route('dashboard'));
    }
}
