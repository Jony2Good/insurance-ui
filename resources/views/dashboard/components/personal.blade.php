@extends('dashboard.main')

@section('content')
    <div class="container mt-4">
        <h2>Персональная информация <button id="js-fill-btn" class="btn btn-primary d-none">Заполнить</button></h2>
        <p class="m-0 pb-3">Внимательно проверяйте, информация используется для формирования полиса</p>
        <form id="profileForm">
            <div class="row mb-3">
                <div class="col-md-3 text-center">
                    <img src="{{ asset('images/team3.jpg') }}" class="img-thumbnail mb-2" alt="Фото пользователя"
                        id="userPhoto" style="max-width:150px;">
                    <input type="file" class="form-control" name="photo" id="photo" disabled>
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label>ФИО</label>
                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label>Дата рождения</label>
                        <input type="text" class="form-control" name="birth_date" value="{{ $user->birth_date ?? '' }}"
                            disabled>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <h4>Паспорт гражданина РФ</h4>
                        <div class="mb-3">
                            <label>Серия</label>
                            <input type="text" class="form-control" name="passport_serie"
                                value="{{ $doc->passport_serie ?? '' }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label>Номер</label>
                            <input type="text" class="form-control" name="passport_number"
                                value="{{ $doc->passport_number ?? '' }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label>Кем выдан</label>
                            <input type="text" class="form-control" name="passport_issued_by"
                                value="{{ $doc->issued_by ?? '' }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label>Дата выдачи</label>
                            <input type="text" class="form-control" name="passport_issue_date"
                                value="{{ $doc->issue_date ?? '' }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label>Адрес регистрации</label>
                            <input type="text" class="form-control" name="passport_registration_address"
                                value="{{ $doc->registration_address ?? '' }}" disabled>
                        </div>
                    </div>
                    <div class="col">
                        <h4>Водительское удостоверение РФ</h4>
                        <div class="mb-3">
                            <label>Серия</label>
                            <input type="text" class="form-control" name="dl_serie" value="{{ $dl->series ?? '' }}"
                                disabled>
                        </div>
                        <div class="mb-3">
                            <label>Номер</label>
                            <input type="text" class="form-control" name="dl_number" value="{{ $dl->number ?? '' }}"
                                disabled>
                        </div>
                        <div class="mb-3">
                            <label>Кем выдан</label>
                            <input type="text" class="form-control" name="dl_issued_by"
                                value="{{ $dl->issued_by ?? '' }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label>Дата выдачи</label>
                            <input type="text" class="form-control" name="dl_issue_date"
                                value="{{ $dl->issue_date ?? '' }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label>Категория ВУ</label>
                            <select id="select" class="form-control" name="dl_category">
                                @if ($dl->category ?? '')
                                    <option value="{{ $dl->value }}" selected> {{ $dl->category }}</option>
                                @else
                                    <option value="0">Не выбрано</option>
                                    <option value="1">Грузовые</option>
                                    <option value="2">Легковые</option>
                                    <option value="3">Мотоциклы</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <button type="button" id="editBtn" class="btn btn-primary">Редактировать</button>
                <button type="button" id="saveBtn" class="btn btn-success d-none">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#editBtn').on('click', function() {
            $('#profileForm input').prop('disabled', false);
            $('#editBtn').addClass('d-none');
            $('#saveBtn').removeClass('d-none');
            $('#js-fill-btn').removeClass('d-none');

            attachFillFakeDataHandler();
        });

        $('#saveBtn').on('click', function() {
            e.preventDefault();

            let userData = {
                name: $('input[name="name"]').val(),
                email: $('input[name="email"]').val(),
                birth_date: $('input[name="birth_date"]').val()
            };

            let docData = {
                serie: $('input[name="passport_serie"]').val(),
                number: $('input[name="passport_number"]').val(),
                issued_by: $('input[name="passport_issued_by"]').val(),
                issue_date: $('input[name="passport_issue_date"]').val(),
                address: $('input[name="passport_registration_address"]').val()
            };

            let dlData = {
                serie: $('input[name="dl_serie"]').val(),
                number: $('input[name="dl_number"]').val(),
                issued_by: $('input[name="dl_issued_by"]').val(),
                issue_date: $('input[name="dl_issue_date"]').val(),
                category: $('select[name="dl_category"]').val()
            }

            $.ajax({
                url: '/dashboard/me',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    user_data: userData,
                    passport: docData,
                    driver_license: dlData
                }),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function() {
                    $('#profileForm input').prop('disabled', true);
                    $('#editBtn').removeClass('d-none');
                    $('#saveBtn').addClass('d-none');
                    $('#js-fill-btn').addClass('d-none');
                }
            });
        });
    });

    function attachFillFakeDataHandler() {
        $('#js-fill-btn').off('click').on('click', function() {
            const fakeDataSets = [{
                    name: 'Иванов Иван Иванович',
                    birth_date: '1985-06-15',
                    passport_serie: '4510',
                    passport_number: '123456',
                    passport_issued_by: 'ОВД Центрального района',
                    passport_issue_date: '2005-07-10',
                    passport_registration_address: 'г. Москва, ул. Ленина, д.1',
                    dl_serie: '77',
                    dl_number: '654321',
                    dl_issued_by: 'ГИБДД г. Москвы',
                    dl_issue_date: '2010-05-12',
                    dl_category: '2'
                },
                {
                    name: 'Петров Пётр Петрович',
                    birth_date: '1990-11-22',
                    passport_serie: '5001',
                    passport_number: '987654',
                    passport_issued_by: 'ОВД Северного района',
                    passport_issue_date: '2011-03-05',
                    passport_registration_address: 'г. Санкт-Петербург, пр. Невский, д.10',
                    dl_serie: '78',
                    dl_number: '123789',
                    dl_issued_by: 'ГИБДД г. СПб',
                    dl_issue_date: '2015-08-18',
                    dl_category: '1'
                },
                {
                    name: 'Сидоров Сидор Сидорович',
                    birth_date: '1978-01-05',
                    passport_serie: '6002',
                    passport_number: '555333',
                    passport_issued_by: 'ОВД Южного района',
                    passport_issue_date: '1998-12-01',
                    passport_registration_address: 'г. Казань, ул. Победы, д.15',
                    dl_serie: '16',
                    dl_number: '987654',
                    dl_issued_by: 'ГИБДД г. Казань',
                    dl_issue_date: '2000-04-22',
                    dl_category: '3'
                }
            ];

            const data = fakeDataSets[Math.floor(Math.random() * fakeDataSets.length)];

            const inputs = $('#profileForm').find('input:not([name="email"]):not([name="photo"]), select');

            inputs.each(function() {
                const name = $(this).attr('name');
                if (data.hasOwnProperty(name)) {
                    $(this).val(data[name]);
                } else {
                    if ($(this).is('select')) {
                        $(this).prop('selectedIndex', 0);
                    } else {
                        $(this).val('');
                    }
                }
            });
        });
    }
</script>
