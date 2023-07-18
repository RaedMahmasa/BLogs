@extends('layouts.dashboard')

@section('title', 'Edit Blogs')

@section('breadcrumb')
@parent
<li class="breadcrumb-item">blogs</li>
<li class="breadcrumb-item active">Edit blogs</li>
@endsection

@section('content')

<form action="{{ route('dashboard.blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    @include('dashboard.blogs._form')
</form>

@endsection
