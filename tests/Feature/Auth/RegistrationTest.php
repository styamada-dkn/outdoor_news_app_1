<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function ユーザ登録画面表示(): void
    {

        $url = '/register';

        // 未認証の場合
        $this->get($url)->assertRedirect(route('login'));

        // 認証済みにする
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get($url);

        $response->assertStatus(200);
    }

    #[Test]
    public function ユーザ登録成功(): void
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/register', [
            'name' => 'Test User',
            'nickname' => 'test',
            'email' => 'test@example.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        // 認証済みのテストは行わない・・・ユーザ登録後ログイン状態にしない（初回時は他ユーザーにより登録されるため）
        // $this->assertAuthenticated();

        $response->assertRedirect(route('profile.index', absolute: false));

        $this->get(route('profile.index'))
            ->assertSee('ユーザ登録完了しました');
    }

    #[Test]
    public function バリデーション(): void
    {
        $url = '/register';

        // 認証済みにする
        $user = User::factory()->create();
        $this->actingAs($user);

        // リダイレクト
        $this->from($url)
            ->post($url, [
                'name' => '',
                'nickname' => '',
                'email' => '',
                'password' => '',
                'password_confirmation' => '',
            ])
            ->assertRedirect($url);

        // 名前未入力
        $this->from($url)
            ->post($url, [
                'name' => '',
            ])
            ->assertInvalid(['name' => '名前は必ず指定してください。']);

        // 名前を入力
        $this->from($url)
            ->post($url, [
                'name' => 'Test User',
            ])
            ->assertValid('name');

        // ニックネーム未入力
        $this->from($url)
            ->post($url, [
                'nickname' => '',
            ])
            ->assertInvalid(['nickname' => 'ニックネームは必ず指定してください。']);

        // ニックネームを入力
        $this->from($url)
            ->post($url, [
                'nickname' => 'test',
            ])
            ->assertValid('nickname');

        // パスワード未入力
        $this->from($url)
            ->post($url, [
                'password' => '',
            ])
            ->assertInvalid([
                'password' => 'パスワードは必ず指定してください。',
        ]);

        // パスワードを入力
        $this->from($url)
            ->post($url, [
                'password' => '12345678',
                'password_confirmation' => '12345678',
            ])
            ->assertValid('password');
    }
}
