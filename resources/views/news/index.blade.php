@extends('layouts.main')

@section('menu')
    @include('header')
@endsection

@section('content')
    <h3>Категории новостей</h3>
    <div class="list-group">
    @forelse ($categories as $category)
        <a class="list-group-item list-group-item-action" href="/news/{{ $category['slug'] }}">{{  $category['name'] }}</a>
    @empty
        <p>Нет никаких новостей</p>
    @endforelse
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection

