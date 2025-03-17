@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h1>Yeni Görev Ekle</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Görev Başlığı</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="is_completed" class="form-label">Görev Durumu</label>
            <select name="is_completed" id="is_completed" class="form-select" required>
                <option value="0">Tamamlanmadı</option>
                <option value="1">Tamamlandı</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
@endsection
