<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles.
     */
    public function index(Request $request): View
    {
        $query = Article::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('summary', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $articles = $query->latest('published_at')->paginate(10)->withQueryString();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create(): View
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'in:Edukasi,Kegiatan,Penelitian,Pengembangan Produk'],
            'summary' => ['required', 'string'],
            'content' => ['required', 'string'],
            'author' => ['required', 'string', 'max:150'],
            'reading_time' => ['nullable', 'string', 'max:50'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'published_at' => ['required', 'date'],
            'is_published' => ['boolean'],
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }
        $validated['slug'] = $slug;

        if (empty($validated['reading_time'])) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $minutes = max(1, (int) ceil($wordCount / 180));
            $validated['reading_time'] = "{$minutes} menit baca";
        }

        // Handle Image Upload if provided
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/articles'), $filename);
            $validated['image_url'] = '/images/articles/'.$filename;
        }

        unset($validated['image_file']);
        $validated['is_published'] = $request->boolean('is_published');

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel "'.$validated['title'].'" berhasil diterbitkan!');
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article): View
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'in:Edukasi,Kegiatan,Penelitian,Pengembangan Produk'],
            'summary' => ['required', 'string'],
            'content' => ['required', 'string'],
            'author' => ['required', 'string', 'max:150'],
            'reading_time' => ['nullable', 'string', 'max:50'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'published_at' => ['required', 'date'],
            'is_published' => ['boolean'],
        ]);

        if ($article->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $count = 1;
            while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
            $validated['slug'] = $slug;
        }

        if (empty($validated['reading_time'])) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $minutes = max(1, (int) ceil($wordCount / 180));
            $validated['reading_time'] = "{$minutes} menit baca";
        }

        // Handle Image Upload if provided
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/articles'), $filename);
            $validated['image_url'] = '/images/articles/'.$filename;
        }

        unset($validated['image_file']);
        $validated['is_published'] = $request->boolean('is_published');

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel "'.$article->title.'" berhasil diperbarui!');
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $title = $article->title;
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel "'.$title.'" berhasil dihapus.');
    }
}
