<!-- resources/views/contractors/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактирование контрагента</h1>

        <!-- Вывод ошибок валидации -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Форма для редактирования контрагента -->
        <form action="{{ route('contractors.update', $contractor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name">Название контрагента</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $contractor->name) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="inn">ИНН</label>
                <input type="text" name="inn" id="inn" class="form-control" value="{{ old('inn', $contractor->inn) }}" required maxlength="10">
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $contractor->email) }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Обновить</button>
        </form>
    </div>
@endsection
