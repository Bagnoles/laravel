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
                        <h3>Список новостей</h3>
                        <div class="list-group">
                            @forelse ($news as $item)
                                <a class="list-group-item list-group-item-action" href="/news/{{ $slug }}/{{ $item['id'] }}">{{  $item['title'] }}</a>
                            @empty
                                <p>В этой категории нет новостей</p>
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
