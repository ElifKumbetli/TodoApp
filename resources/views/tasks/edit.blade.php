@extends('layouts.app')

@section('content')
    <h1>Görev Düzenle</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Görev Başlığı</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
    <label for="category_id" class="form-label">Kategori</label>
    <!--TODO: id ve name gibi şeyleri silerek dene,backend'e giden değer hangisi, üst satıra bak-->
    <select name="category_id" id="category_id" class="form-select" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ $task->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>


        <div class="mb-3">
            <label for="is_completed" class="form-label">Görev Durumu</label>
            <select name="is_completed" id="is_completed" class="form-select" required>
                <option value="0" {{ $task->is_completed == 0 ? 'selected' : '' }}>Tamamlanmadı</option>
                <option value="1" {{ $task->is_completed == 1 ? 'selected' : '' }}>Tamamlandı</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
@endsection
