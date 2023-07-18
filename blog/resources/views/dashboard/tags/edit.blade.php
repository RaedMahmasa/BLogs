@extends('layouts.dashboard')

@section('title','Edit Tag')

@section('breadcrumb')
<li class="breadcrumb-item active">Tags</li>
<li class="breadcrumb-item active">Edit Tag</li>
@endsection

@section('content')

<form action="{{ route('dashboard.tags.update' , $tag->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('dashboard.tags._form')
</form>

@endsection