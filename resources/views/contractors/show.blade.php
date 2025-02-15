@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-white rounded">
            <h1 class="mb-4 text-center">Детали контрагента</h1>

            <div class="card">
                <div class="card-header bg-primary text-white">
                    Контрагент: {{ $contractor->name }}
                </div>
                <div class="card-body">
                    <p><strong>ИНН:</strong> {{ $contractor->inn }}</p>
                    <p><strong>Email:</strong> {{ $contractor->email }}</p>
                    <p><strong>Дата создания:</strong> {{ $contractor->created_at->format('d.m.Y H:i') }}</p>
                    <p><strong>Дата обновления:</strong> {{ $contractor->updated_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('contractors.edit', $contractor->id) }}" class="btn btn-warning">Редактировать</a>
                <form action="{{ route('contractors.destroy', $contractor->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этого контрагента?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
