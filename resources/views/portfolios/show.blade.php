@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $portfolio->title }}</h2>
    <p>{{ $portfolio->description }}</p>
    
    @if ($portfolio->images)
        @foreach (json_decode($portfolio->images) as $image)
            <img src="{{ asset('storage/' . $image) }}" class="img-fluid" alt="Portfolio Image">
        @endforeach
    @endif

    @if ($portfolio->video_path)
        <video width="320" height="240" controls>
            <source src="{{ asset('storage/' . $portfolio->video_path) }}" type="video/mp4">
            Ваш браузер не підтримує відтворення відео.
        </video>
    @endif
    
    <!-- Додайте інші деталі портфоліо, якщо потрібно -->
    <a href="{{ route('portfolios.index') }}" class="btn btn-primary mt-3">Назад до портфоліо</a>
</div>
@endsection
