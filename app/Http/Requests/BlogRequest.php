<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string','max:60'],
            'news_date' => ['required', 'date', 'before_or_equal:today'],
            'body' => ['required', 'max:20000'],
            "category_id" => ["required","exists:categories,id"],
            'image' => [
                'nullable',
                'file', // ファイルがアップロードされている
                'image', // 画像ファイルである
                'max:10000', // ファイル容量が10mb以下である
                'mimes:jpeg,jpg,png', // 形式はjpegかpng
                'dimensions:min_width=500,min_height=350,max_width=6000,max_height=4000',
                // 画像の解像度が500px * 350px ~ 6000px * 4000px
            ],

        ];
    }
    public function attributes()
    {
        return [
            'title' => "タイトル",
            'news_date' => "投稿日",
            'body' => "記事本文",
            'category_id' => "カテゴリー",
            'image' => 'ニュース投稿画像',
        ];
    }
    public function messages()
    {
        return [
            'news_date.before_or_equal' => ":attributeには、今日を含む過去の日付を指定してください",
        ];
    }

}
