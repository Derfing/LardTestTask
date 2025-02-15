<!-- resources/views/contractors/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список контрагентов</h1>

        <!-- Успешное сообщение -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Кнопка добавления контрагента -->
        <a href="{{ route('contractors.create') }}" class="btn btn-primary mb-3">Добавить контрагента</a>

        <!-- Таблица с контрагентами -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Название</th>
                <th>ИНН</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contractors as $contractor)
                <tr>
                    <td>{{ $contractor->name }}</td>
                    <td>{{ $contractor->inn }}</td>
                    <td>{{ $contractor->email }}</td>
                    <td>
                        <a href="{{ route('contractors.show', $contractor->id) }}" class="btn btn-info btn-sm">Просмотреть</a>
                        <a href="{{ route('contractors.edit', $contractor->id) }}" class="btn btn-warning btn-sm">Редактировать</a>

                        <!-- Форма удаления контрагента -->
                        <form action="{{ route('contractors.destroy', $contractor->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этот контрагент?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Пагинация -->
        {{ $contractors->links() }}
    </div>
@endsection
