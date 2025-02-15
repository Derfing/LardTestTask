@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-white rounded">
            <h1 class="mb-4 text-center">Список контрагентов</h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('contractors.create') }}" class="btn btn-primary">Добавить контрагента</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" style="table-layout: fixed; width: 100%;">
                    <thead>
                    <tr>
                        <th style="width: 25%;">Название</th>
                        <th style="width: 20%;">ИНН</th>
                        <th style="width: 30%;">Email</th>
                        <th style="width: 25%;">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($contractors)
                        @foreach($contractors as $contractor)
                            <tr>
                                <td>{{ $contractor->name }}</td>
                                <td>{{ $contractor->inn }}</td>
                                <td>{{ $contractor->email }}</td>
                                <td class="text-center d-flex justify-content-around">
                                    <a href="{{ route('contractors.show', $contractor->id) }}" class="btn btn-info btn-sm">Просмотреть</a>
                                    <a href="{{ route('contractors.edit', $contractor->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                                    <form action="{{ route('contractors.destroy', $contractor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Вы уверены, что хотите удалить этого контрагента?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <nav>
                    <ul class="pagination">
                        <li class="page-item {{ $contractors->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $contractors->previousPageUrl() }}">&laquo; Предыдущая</a>
                        </li>
                        @for ($i = 1; $i <= $contractors->lastPage(); $i++)
                            <li class="page-item {{ $contractors->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $contractors->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $contractors->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $contractors->nextPageUrl() }}">Следующая &raquo;</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
