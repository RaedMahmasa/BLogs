@extends('layouts.dashboard')

@section('title','Tags')

@section('breadcrumb')
<li class="breadcrumb-item active">Tags</li>
@endsection

@section('content')

<div class="mb-5">
    <a href="{{ route('dashboard.tags.create') }}" class="btn btn-sm btn-outline-primary mr-2">Create</a>
</div> 

<x-alert type="success" />
<x-alert type="info" />

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tags as $tag)
        <tr>
            <td>{{$tag->name}}</td>
            <td>
                <a href="{{ route('dashboard.tags.edit' , $tag->id )}}" class="btn btn-sm btn-outline-success">Edite</a>
            </td>
            <td>
                <form action="{{ route('dashboard.tags.destroy' , $tag->id )}}" method="post">
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


@endsection