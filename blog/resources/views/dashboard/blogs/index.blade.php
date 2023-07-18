@extends('layouts.dashboard')

@section('title','Blogs')

@section('breadcrumb')
<li class="breadcrumb-item active">Blogs</li>
@endsection

@section('content')

<div class="mb-5">
    <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-sm btn-outline-primary mr-2">Create</a>
</div>



<x-alert type="success" />
<x-alert type="info" />

<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
    <x-form.input name="filter[title]" placeholder="Title" class="mx-2" :value="request('title')" />

    <select name="filter[tag_id]" class="form-control">
        <option value="">All</option>
        @foreach ($allTags as $tag)
        <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>

    <select name="filter[category_id]" class="form-control">
        <option value="">All</option>
        @foreach ($allCategories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <button class="btn btn-dark">Filter</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Description</th>
            <th>Tags</th>
            <th>Category</th>
            <th>Posting time</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($blogs as $blog)
        <tr>
            <td><img src="{{ $blog->getFirstMediaUrl('blog_image') }}" alt="" height="50"></td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->description}}</td>
            <td>
                @foreach ($blog->tags as $singleTag)
                <span>{{ $singleTag->name }},</span>
                @endforeach
            </td>
            <td>
                <span>{{ $blog->category->name }}</span>
            </td>
            <td>{{$blog->posting_time}}</td>
            <td>
                <a href="{{ route('dashboard.blogs.edit' , $blog->id )}}" class="btn btn-sm btn-outline-success">Edite</a>
            </td>
            <td>
                <form action="{{ route('dashboard.blogs.destroy' , $blog->id )}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No tags defined</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $blogs->links() }}
@endsection
