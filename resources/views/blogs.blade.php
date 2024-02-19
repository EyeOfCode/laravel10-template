@extends('layouts.app')

@section('title', 'Test Blogs Page')

@section('content')
<h1>Blogs</h1>
<a href="{{ route('main') }}" class="text-blue-600">Main</a>
<hr />
<form class="w-full max-w-sm mb-2" method="POST" action="{{ route('blog-create') }}">
    @csrf
    <label>Create blog</label>
    <div class="flex items-center border-b border-teal-500 py-2 form">
        <input
            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
            type="text" placeholder="title" name="title" aria-label="Full title" />
        <button
            class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
            type="submit">
            Create
        </button>
    </div>
    @error('title')
    <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</form>
<ul class="list-disc list-inside w-full">
    @foreach ($blogs as $item)
    <li class="flex">
        <a href="{{ route('blog', ['id' => $item->id]) }}" class="text-blue-600 px-2">{{$item->title}}</a>
        <a href="{{ route('blog-delete', ['id' => $item->id]) }}" class="text-red-600">Deleate</p>
    </li>
    @endforeach
</ul>
<div class="row">
    <div class="col-md-12">
        {{ $blogs->links('pagination::tailwind') }}
    </div>
</div>
@error('error')
<p class="text-red-500 text-xs italic">{{ $message }}</p>
@enderror
@endsection