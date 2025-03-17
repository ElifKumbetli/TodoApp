@extends('layouts.app')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (Session::has('silindi'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('silindi') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <h1>Görevler</h1>

    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Başlık</th>
                <th scope="col">Kategori</th>
                <th scope="col">Durum</th> 
                <th scope="col">İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->category->name }}</td>
                    <td>
                        @if($task->is_completed)
                            <span class="badge bg-success">Tamamlandı</span>
                        @else
                            <span class="badge bg-danger">Tamamlanmadı</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinizden emin misiniz?')">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Yeni Görev Ekle</a>
@endsection
