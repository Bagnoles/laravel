@extends('layouts.app')

@section('menu')
    @include('admin/menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Форма добавления новости</h3>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="/news/add" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="title" value="" class="form-control" placeholder="Заголовок новости" aria-label="Заголовок новости" aria-describedby="basic-addon2">
                            </div>
                            <div class="input-group">
                                <textarea name="text" class="form-control" aria-label="Текст новости" placeholder="Текст новости"></textarea>
                            </div>
                            <p class="mt-3">Выберите категорию:</p>
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
