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
                        <h3>Категории новостей</h3>
                        <div class="list-group">
                            @forelse ($categories as $category)
                                <a class="list-group-item list-group-item-action" href="/news/{{ $category->slug }}">{{  $category->name }}</a>
                            @empty
                                <p>Нет никаких новостей</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection

