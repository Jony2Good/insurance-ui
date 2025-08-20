@extends('dashboard.main')

@section('content')
    <h1>Мои полисы</h1>
@if (!empty($policies))
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Номер полиса</th>
                <th>Срок действия</th>
                <th>Статус</th>
                <th>Стоимость</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($policies as $policy)
                <tr>
                    <td>{{ $policy['number'] ?? '' }}</td>
                    <td>{{ $policy['condition']['startDate'] ?? '' }} - {{ $policy['condition']['endDate'] ?? '' }}</td>
                    <td>{{ $status[$policy['status']] ?? 'Неизвестный статус' }}</td>
                    <td>{{ $policy['price'] ?? 0 }} ₽</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm view-policy-btn"
                                data-number="{{ $policy['number'] }}">
                            <i class="bi bi-eye"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('.view-policy-btn').click(function() {
            let number = $(this).data('number');
            // открываем новый таб, BFF вернёт PDF
            window.open('/dashboard/file?number=' + number, '_blank');
        });

    });
</script>
