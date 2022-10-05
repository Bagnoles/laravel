@extends('layouts.main')

@section('menu')
    @include('header')
@endsection

@section('content')
    @if($news)
        <h3>{{ $news['title'] }}</h3>
        <p>{{ $news['text'] }}</p>
    @else
        <p>Такой новости не существует.</p>
    @endif
    <a href="/news/{{ $slug }}">Вернуться назад в категорию</a>
@endsection

@section('footer')
    @include('footer')
@endsection
