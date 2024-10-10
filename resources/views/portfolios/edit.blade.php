@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати портфоліо</h1>
    <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Назва:</label>
            <input type="text" id="title" name="title" value="{{ $portfolio->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Опис:</label>
            <textarea id="description" name="description" class="form-control" required>{{ $portfolio->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="images">Зображення:</label>
            <input type="file" id="images" name="images[]" class="form-control" accept="image/*" multiple>
            @if ($portfolio->images)
                @foreach ($portfolio->images as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="Current Image" width="150" class="mt-2">
                @endforeach
            @endif
        </div>

        <div class="form-group">
            <label for="video">Відео:</label>
            <input type="file" id="video" name="video" class="form-control" accept="video/*">
            @if ($portfolio->video)
                <video width="150" controls class="mt-2">
                    <source src="{{ asset('storage/' . $portfolio->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Зберегти зміни</button>
    </form>
</div>
@endsection
