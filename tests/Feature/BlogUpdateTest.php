<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class BlogUpdateTest extends TestCase
{
    /*
    << TEST概要 >>
    1．テスト初期データ作成
    2. アクセス制御テスト
    3. バリデーションテスト
    4. データベースへの登録テスト
     */

    private $user;
    private $categories;
    private $blog;
    private $param;

    use RefreshDatabase;

    public function setUp() : void {
        parent::setUp();

        /*
        1．テスト初期データ作成
        ・テストユーザ
        ・カテゴリーデータ
        ・記事データ
         */
        $this->user = User::factory()->create();
        // TestCase.phpにてCategorySeeder実行（RefreshDatabase実行時）
        $this->categories = Category::all();

        $this->blog = Blog::factory()->create([
            'title' => 'test title',
            'category_id' => $this->categories[0]->id,
            'user_id' => $this->user->id,
        ]);

        // 更新用入力データ
        $this->param = [
            'news_date' => '2024-07-25',
            'title' => 'test test title',
            'body' => 'test,test,test,--------',
            'category_id' => $this->categories[0]->id,
            'user_id' => $this->user->id,
        ];
    }

    // 2. アクセス制御テスト
    #[Test]
    public function アクセス制御(): void
    {
        $url = route("admin.blog");

        // 未認証の場合、記事一覧画面にアクセス不可
        $this->get($url)
            ->assertRedirect(route('login'));

        $url = route("admin.blog.edit",$this->blog);

        // 未認証の場合、記事更新画面にアクセス不可
        $this->get($url)
            ->assertRedirect(route('login'));

        $url = route("admin.blog.update",$this->blog);

        // 未認証の場合は、更新不可
        $this->put($url,$this->param)
            ->assertRedirect(route('login'));

        //承認済みの場合はアクセス可
        $this->actingAs($this->user);
        $this->get($url)
            ->assertStatus(200);

        // 記事作成者以外は、更新不可
        $other_user = User::factory()->create();
        $this->actingAs($other_user);

        $this->put($url,$this->param)
            ->assertForbidden();

        // 記事が更新されていない
        $this->assertSame('test title', $this->blog->fresh()->title);

    }

    // 3. バリデーションテスト
    #[Test]
    public function バリデーション(): void
    {
        $url = route("admin.blog.update",$this->blog);

        $this->actingAs($this->user);

        // リダイレクト先の確認
        $this->from(route("admin.blog.edit",$this->blog))
            ->put($url, ['title' => ''])
            ->assertRedirect(route("admin.blog.edit",$this->blog));

        // タイトルが空
        $this->put($url,['title' => ''])
            ->assertInvalid(['title' => 'タイトルは必ず指定してください。']);

        // 投稿日が空
        $this->put($url,['news_date' => ''])
            ->assertInvalid(['news_date' => '投稿日は必ず指定してください。']);

        // 本文が空
        $this->put($url,['body' => ''])
            ->assertInvalid(['body' => '記事本文は必ず指定してください。']);

        // カテゴリーが空
        $this->put($url,['category_id' => ''])
            ->assertInvalid(['category_id' => 'カテゴリーは必ず指定してください。']);

        // タイトルが６０文字超過
        $this->put($url,['title' => str_repeat('a',61)])
            ->assertInvalid(['title' => 'タイトルは、60文字以下で指定してください。']);

        // 投稿日が未来日
        $this->put($url,['news_date' => date('Y-m-d',strtotime('+1 day'))])
            ->assertInvalid(['news_date' => '投稿日には、今日を含む過去の日付を指定してください']);

        // 存在しないカテゴリーID
        $this->put($url,['category_id' => '0'])
            ->assertInvalid(['category_id' => '選択されたカテゴリーは正しくありません。']);

    }

    // 4. データベースへの登録テスト
    #[Test]
    public function データベース登録(): void
    {
        $url = route("admin.blog.update",$this->blog);

        $this->actingAs($this->user);

        //更新処理・・・リダイレクト・メッセージの確認
        $this->from(route("admin.blog.edit",$this->blog))
            ->put($url, $this->param)
            ->assertRedirect(route("admin.blog.edit",$this->blog));

        $this->get(route("admin.blog.edit",$this->blog))
            ->assertSee('登録が完了しました');

        $updatedBlog = [
            'id' => $this->blog->id,
            'news_date' => $this->param['news_date'],
            'title' => $this->param['title'],
            'body' => $this->param['body'],
            'category_id' => $this->param['category_id'],
            'user_id' => $this->param['user_id'],
        ];

        // データベースの内容を確認
        $this->assertDatabaseHas('blogs',$updatedBlog);

    }
}
