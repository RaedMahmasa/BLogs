<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;
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
                ->orderBy('posting_time')
                ->where('posting_time', "<=", now('asia/Damascus'))
        )->allowedFilters([
            'title',
            'category_id',
            AllowedFilter::partial('tag_id', 'tags.id')
        ])
            ->paginate(4);

        return view('front.blogs.index', compact('blogs', 'allCategories', 'allTags'));
    }

    public function show(Blog $blog)
    {
        $blog->with('tags','category');
        return view('front.blogs.blog.index',compact('blog'));
    }
}
