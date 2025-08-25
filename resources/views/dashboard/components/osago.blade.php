@extends('dashboard.main')

@section('content')
    <div class="container">
        <h2>Оформление полиса ОСАГО</h2>
        <form id="osagoForm">
            @csrf
            <!-- Раздел: Условия договора -->
            <div class="card mb-3">
                <div class="card-header">
                    Условия договора
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="contractType" class="form-label">Тип договора</label>
                        <select class="form-select" id="contractType" name="contractType">
                            <option value="1" selected>Электронный</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="startTime" class="form-label">Время начала</label>
                        <input type="time" class="form-control" id="startTime" name="startTime" required>
                    </div>

                    <div class="mb-3">
                        <label for="startDate" class="form-label">Дата начала</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>

                    <div class="mb-3">
                        <label for="endDate" class="form-label">Дата окончания</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>
                </div>
            </div>
            <button type="button" id="calculateBtn" class="btn btn-primary">Рассчитать</button>
            <button type="button" id="payBtn" class="btn btn-success d-none">Оплатить</button>
        </form>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        $('#startTime').val(`${hours}:${minutes}`);

        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        $('#startDate').val(`${year}-${month}-${day}`);

        const yesterday = new Date(now);
        yesterday.setDate(now.getDate() - 1);
        const yYear = yesterday.getFullYear();
        const yMonth = String(yesterday.getMonth() + 1).padStart(2, '0');
        const yDay = String(yesterday.getDate()).padStart(2, '0');
        $('#endDate').val(`${yYear}-${yMonth}-${yDay}`);

        $('#calculateBtn').on('click', function(e) {
            e.preventDefault();

            let formData = {
                contractType: $('#contractType').val(),
                startTime: $('#startTime').val(),
                startDate: $('#startDate').val(),
                endDate: $('#endDate').val(),
            };

            $.ajax({
                url: '/dashboard/calc',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: formData,
                success: function(response) {

                    if (response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: "Ошибка при расчете полиса",
                            text: response.message,
                        });
                    } else {

                        let htmlContent = `
                <div style="text-align: left;">
                    <p><b>Номер полиса:</b> ${response.number}</p>
                    <p><b>Цена:</b> ${response.price} <strong>₽</strong></p>
                    <p><b>Дата начала страхового периода</b> ${response.policy.condition.startDate}</p>
                    <p><b>Страхователь:</b> {{ auth()->user()->name }}</p>
                    <p><b>Автомобиль номер и vin:</b> ${response.policy.vehicle.regPlate} (${response.policy.vehicle.vin})</p>
                </div>
            `;

                        Swal.fire({
                            title: `Успешно расчитан полис ОСАГО`,
                            html: htmlContent,
                            showCancelButton: true,
                            cancelButtonText: 'Отменить',
                            confirmButtonText: 'Оплатить',
                            confirmButtonColor: '#28a745',
                            cancelButtonColor: '#dc3545',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // действие при нажатии "Оплатить"

                                async function hashFormData(formData) {
                                    const jsonString = JSON.stringify(formData);
                                    const encoder = new TextEncoder();
                                    const data = encoder.encode(jsonString);
                                    const hashBuffer = await crypto.subtle
                                        .digest('SHA-256', data);
                                    const hashArray = Array.from(new Uint8Array(
                                        hashBuffer));
                                    const hashHex = hashArray.map(b => b
                                            .toString(16).padStart(2, '0'))
                                        .join('');
                                    return hashHex;
                                }

                                hashFormData(formData).then(idempotencyKey => {                                

                                    $.ajax({
                                        url: '/dashboard/pay',
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Idempotency-Key': idempotencyKey
                                        },
                                        data: {
                                            number: response.number,
                                            request_key: idempotencyKey
                                        },
                                        success: function(
                                            payResponse) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Оплата успешна!',
                                                text: `Полис №${response.number} оплачен и активирован.`,
                                            });
                                        },
                                        error: function(res) {
                                            console.log(res);
                                            
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Ошибка',
                                                text: res.responseJSON.message,
                                            });
                                        }
                                    });
                                });
                            }
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка при расчете',
                        text: xhr.responseJSON.message,
                    });
                }
            });
        });
    });
</script>
