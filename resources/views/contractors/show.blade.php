<!-- resources/views/contractors/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Детали контрагента</h1>

        <div class="card">
            <div class="card-header">
                Контрагент: {{ $contractor->name }}
            </div>
            <div class="card-body">
                <p><strong>ИНН:</strong> {{ $contractor->inn }}</p>
                <p><strong>Email:</strong> {{ $contractor->email }}</p>
                <p><strong>Дата создания:</strong> {{ $contractor->created_at->format('d.m.Y H:i') }}</p>
                <p><strong>Дата обновления:</strong> {{ $contractor->updated_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('contractors.edit', $contractor->id) }}" class="btn btn-warning">Редактировать</a>
            <form action="{{ route('contractors.destroy', $contractor->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этот контрагент?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
@endsection
