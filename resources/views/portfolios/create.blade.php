@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Додати Портфоліо</h2>
    <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Назва</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Опис</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="images">Завантажити зображення</label>
            <input type="file" class="form-control" name="images[]" accept="image/*" multiple> <!-- Додаємо атрибут multiple -->
        </div>
        <div class="form-group">
            <label for="video">Завантажити відео</label>
            <input type="file" class="form-control" name="video" accept="video/*">
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
</div>
@endsection
