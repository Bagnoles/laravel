@extends('layouts.main')

@section('menu')
    @include('header')
@endsection

@section('content')
    <h3>Список новостей</h3>
    <div class="list-group">
        @forelse ($news as $item)
            <a class="list-group-item list-group-item-action" href="/news/{{ $slug }}/{{ $item['id'] }}">{{  $item['title'] }}</a>
        @empty
            <p>В этой категории нет новостей</p>
        @endforelse
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
