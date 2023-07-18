@extends('layouts.dashboard')

@section('title','Tags')

@section('breadcrumb')
<li class="breadcrumb-item active">Tags</li>
<li class="breadcrumb-item active">Tag Create</li>
@endsection

@section('content')

<form action="{{ route('dashboard.tags.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('dashboard.tags._form')


</form>

@endsection
