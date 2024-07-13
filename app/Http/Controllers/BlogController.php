<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['user', 'category'])->latest("updated_at")->paginate(10);
        // ランダムにデータ取得（おすすめ記事）
        $recommendItems = Blog::with(['user', 'category'])->inRandomOrder()->take(5)->get();

        return view("site.blog", compact("blogs", "recommendItems"));
    }
    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view("site.blog-detail", compact('blog'));
    }
    public function search($id)
    {
        $blogs = Blog::with(['user', 'category'])->where('category_id', $id)->latest("updated_at")->paginate(10);
        // ランダムにデータ取得（おすすめ記事）
        $recommendItems = Blog::with(['user', 'category'])->where('category_id', $id)->inRandomOrder()->take(5)->get();

        return view("site.blog", compact("blogs", "recommendItems"));
    }

    // 管理画面　################################################
    public function indexByUserId()
    {
        $blogs = Blog::with(['user', 'category'])->where('user_id', Auth::user()->id)->latest("updated_at")->paginate(5);
        return view('dashboard', compact("blogs"));
    }

    public function indexWithAdmin()
    {
        $blogs = Blog::with(['user', 'category'])->latest("updated_at")->paginate(10);
        return view("admin.index", compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('display_order')->get();
        return view('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {

        $blog = new Blog($request->validated());
        $blog->user_id = Auth::user()->id;

        $path = null;

        try {
            DB::beginTransaction();

            if ($request->hasFile("image")) {
                $path = $request->file("image")->store("blogs", "public");
                $blog->image = $path;
            }
            $blog->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
        return back()->with(['message' => "登録が完了しました"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::orderBy('display_order')->get();
        return view("admin.edit", compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $validated = $request->validated();

        $path = null;
        try {
            DB::beginTransaction();

            if ($request->hasFile("image")) {
                if (isset($blog->image)) {
                    Storage::disk("public")->delete($blog->image);
                }
                $path = $request->file("image")->store("blogs", "public");
                $validated['image'] = $path;
            }
            $blog->category()->associate($validated['category_id']);
            $blog->update($validated);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
        return back()->with(['message' => "登録が完了しました"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            DB::beginTransaction();

            $blog->delete();

            if (isset($blog->image) && Storage::disk("public")->exists($blog->image)) {
                Storage::disk("public")->delete($blog->image);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
        return back()->with("message", "投稿を削除しました");
    }
}
