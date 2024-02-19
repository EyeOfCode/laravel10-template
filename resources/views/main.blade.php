@extends('layouts.app')

@section('title', 'Test Main Page')

@section('content')
<h1>Menu</h1>
<hr />
<ul class="list-disc list-inside">
    @foreach ($menus as $item)
    <li>
        <a href="{{ route($item['path']) }}" class="text-blue-600">{{$item['name']}}</a>
    </li>
    @endforeach
</ul>
@endsection