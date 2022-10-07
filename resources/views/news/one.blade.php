@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if($news)
                            <h3>{{ $news['title'] }}</h3>
                            <p>{{ $news['text'] }}</p>
                        @else
                            <p>Такой новости не существует.</p>
                        @endif
                        <a href="/news/{{ $slug }}">Вернуться назад в категорию</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
