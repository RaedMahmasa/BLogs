@extends('layouts.dashboard')

@section('title','Categories')

@section('breadcrumb')
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')

<div class="mb-5">
    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-outline-primary mr-2">Create</a>
</div>

<x-alert type="success" />
<x-alert type="info" />

<table class="table">
    <thead>
        <tr>
            <th>image</th>
            <th>Name</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td><img src="{{ $category->getFirstMediaUrl('category_image') }}" alt="" height="50"></td>
            <td>{{$category->name}}</td>
            <td>
                <a href="{{ route('dashboard.categories.edit' , $category->id )}}" class="btn btn-sm btn-outline-success">Edite</a>
            </td>
            <td>
                <form action="{{ route('dashboard.categories.destroy' , $category->id )}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No categories defined</td>
        </tr>
        @endforelse
    </tbody>
</table>


@endsection
