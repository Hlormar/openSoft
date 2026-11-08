
@extends('layouts.app')

@section('title', isset($fraction) ? 'Редактирование фракции' : 'Добавление фракции')

@section('content')

<div class="container py-4">
    <h1>
        {{ isset($fraction) ? 'Редактирование фракции' : 'Добавление фракции' }}
    </h1>

    <form
        action="{{ isset($fraction)
            ? route('fractions.update', $fraction)
            : route('fractions.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        @if (isset($fraction))
            @method('PUT')
        @endif

        {{-- Название --}}
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>

            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{ old('name', $fraction->name ?? '') }}"
                maxlength="255"
                required
            >

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Подзаголовок --}}
        <div class="mb-3">
            <label for="subtitle" class="form-label">Подзаголовок</label>

            <input
                type="text"
                class="form-control @error('subtitle') is-invalid @enderror"
                id="subtitle"
                name="subtitle"
                value="{{ old('subtitle', $fraction->subtitle ?? '') }}"
                maxlength="255"
            >

            @error('subtitle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Описание --}}
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>

            <textarea
                class="form-control @error('description') is-invalid @enderror"
                id="description"
                name="description"
                rows="6"
                required
            >{{ old('description', $fraction->description ?? '') }}</textarea>

            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Изображение --}}
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>

            <input
                type="file"
                class="form-control @error('image') is-invalid @enderror"
                id="image"
                name="image"
                accept="image/jpeg,image/png,image/webp"
            >

            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if (isset($fraction) && $fraction->image_path)
                <div class="mt-2">
                    <p>Текущее изображение:</p>
                    <img
                        src="{{ asset('storage/laravel/' . $fraction->image_path) }}"
                        alt="{{ $fraction->name }}"
                        style="max-width: 200px;"
                    >
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($fraction) ? 'Сохранить' : 'Добавить' }}
        </button>

        <a href="{{ route('fractions.index') }}" class="btn btn-secondary">
            Отмена
        </a>
    </form>
</div>

@endsection
