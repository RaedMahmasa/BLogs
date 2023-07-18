@extends('layouts.dashboard')

@section('title','Blogs')

@section('breadcrumb')
<li class="breadcrumb-item active">blogs</li>
<li class="breadcrumb-item active">blogs Create</li>

@endsection

@section('content')

<form action="{{ route('dashboard.blogs.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('dashboard.blogs._form')

</form>

@endsection
