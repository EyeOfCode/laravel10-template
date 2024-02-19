@extends('layouts.app')

@section('title', 'Test User Page')

@section('content')
<h1>Blog</h1>
<a href="{{ route('main') }}" class="text-blue-600">Main</a> |
<a href="{{ route('blog-list') }}" class="text-black">Back</a>
<hr />
<div>
    <p>id: {{ $blog->id }}</p>
    <form class="w-full max-w-sm" method="POST" action="{{ route('blog-update', ['id' => $blog->id]) }}">
        @method('PUT')
        @csrf
        <div class="flex items-center border-b border-teal-500 py-2 form">
            <label>title: </label>
            <input
                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                type="text" placeholder="title" name="title" aria-label="Full title" value="{{ $blog->title }}" />
            <button
                class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                type="submit">
                Update
            </button>
        </div>
        <p>createdBy: {{ $blog->user->name }}</p>
        @error('title')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </form>
</div>
@endsection