@extends('layouts.app')

@section('title', 'Todo App - Kategoriler')
@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{Session::get('error')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div>
    <h1>Kategoriler</h1>

    
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori Adı</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    <h2>Yeni Kategori Ekle</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Kategori Adı</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Kategori Adı">
        </div>
        <button type="submit" class="btn btn-primary">Ekle</button>
    </form>
</div>
@endsection
