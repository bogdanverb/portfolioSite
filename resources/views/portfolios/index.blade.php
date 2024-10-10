@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #343a40; /* Темний фон */
        color: white; /* Білий текст */
    }
    .container {
        margin-top: 50px;
    }
    .card {
        background-color: #495057; /* Темний фон для карток */
        color: white; /* Білий текст у картках */
    }
    .card-title {
        font-size: 1.5rem; /* Збільшений розмір заголовка картки */
    }
    .card-text {
        font-size: 1rem; /* Звичайний розмір тексту */
    }
    .btn-info, .btn-warning, .btn-danger, .btn-secondary {
        margin-right: 10px; /* Проміжок між кнопками */
    }
    .btn-info:hover, .btn-warning:hover, .btn-danger:hover, .btn-secondary:hover {
        opacity: 0.8; /* Легка зміна прозорості при наведенні */
    }
    .card-body img, .card-body video {
        max-width: 100%; /* Контент не перевищує розміри картки */
        height: auto;
    }
</style>

<div class="container">
    <h2 class="text-center mb-4">Мої Портфоліо</h2>
    <a href="{{ route('portfolios.create') }}" class="btn btn-primary mb-3">Додати нове портфоліо</a>
    
    @if ($portfolios->isEmpty())
        <p class="text-center">У вас ще немає портфоліо.</p>
    @else
        @foreach ($portfolios as $portfolio)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $portfolio->title }}</h5>
                    <p class="card-text">{{ $portfolio->description }}</p>
                    
                    @if ($portfolio->images)
                        @foreach (json_decode($portfolio->images) as $image)
                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid" alt="Portfolio Image">
                        @endforeach
                    @endif
                    
                    @if ($portfolio->video_path)
                        <video controls>
                            <source src="{{ asset('storage/' . $portfolio->video_path) }}" type="video/mp4">
                            Ваш браузер не підтримує відтворення відео.
                        </video>
                    @endif

                    <div class="mt-3">
                        <a href="{{ route('portfolios.show', $portfolio->id) }}" class="btn btn-info">Переглянути</a>
                        <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-warning">Редагувати</a>
                        <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Ви впевнені, що хочете видалити це портфоліо?');">Видалити</button>
                        </form>
                        <a href="{{ route('portfolios.qr', $portfolio->id) }}" class="btn btn-secondary">Згенерувати QR-код</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
