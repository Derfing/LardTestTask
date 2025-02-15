@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4 bg-white rounded">
            <h1 class="mb-4 text-center">Создание контрагента</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contractors.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Название контрагента</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="inn" class="form-label">ИНН</label>
                    <input type="text" name="inn" id="inn" class="form-control" value="{{ old('inn') }}" required maxlength="10">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a href="{{ route('contractors.index') }}" class="btn btn-secondary">Отмена</a>
                </div>
            </form>
        </div>
    </div>
@endsection
