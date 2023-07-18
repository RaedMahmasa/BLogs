<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BlogsController extends Controller
{


    public function index()
    {

        $allCategories = Category::all();
        $allTags = Tag::all();

        $blogs = QueryBuilder::for(
            Blog::with('category', 'tags')
                ->orderBy('title')
        )
            ->allowedFilters([
                'title',
                'category_id',
                AllowedFilter::partial('tag_id', 'tags.id')
            ])
            ->paginate(2);


        return view('dashboard.blogs.index', compact('blogs', 'allCategories', 'allTags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = new Blog;
        $categories = Category::all();
        $tags = Tag::all();

        return view('dashboard.blogs.create', compact('categories', 'tags', 'blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        DB::beginTransaction();

        $category = Category::find(request()->category_id);

        $blog = $category->blogs()->create($request->validated());

        $blog->tags()->sync(request()->tags_ids);

        $blog
            ->addMedia(request()->image)
            ->toMediaCollection('blog_image');
        DB::commit();


        return Redirect::route('dashboard.blogs.index')
            ->with('success', 'Blog Created!');
    }


    public function edit(Blog $blog)
    {
        $tags = Tag::all();

        $categories = Category::all();

        return view('dashboard.blogs.edit',  compact('blog', 'tags', 'categories'));
    }




    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        DB::beginTransaction();

        $blog->update($request->validated());

        $blog->tags()->sync(request()->tags);

        if ($request->hasFile('image')) {
            $blog
                ->addMedia(request()->image)
                ->toMediaCollection('blog_image');
        }
        DB::commit();

        return redirect()->route('dashboard.blogs.index')
            ->with('success', 'blog updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return Redirect::route('dashboard.blogs.index')
            ->with('success', 'Blog Deleted!');
    }
}
