@extends('dashboard.main')

@section('content')
    @php
        $user = \App\Models\User::with(['vehicle'])
            ->where('email', auth()->user()->email)
            ->first();
    @endphp
    <div class="container mt-4">
        <h3>Информация об объекте страхования <button id="js-fill-btn" class="btn btn-primary d-none">Заполнить</button></h3>
        <form id="insuranceForm">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 d-flex justify-content-between gap-3">
                        <div class="w-100">
                            <label for="vehicleType" class="form-label">Тип транспортного средства</label>
                            <select class="form-select" id="vehicleType" name="vehicleType" disabled>
                                <option value="0" @selected(($user->vehicle->vehicleType ?? 0) == 0)>Не выбрано</option>
                                <option value="1" @selected(($user->vehicle->vehicleType ?? 0) == 1)>Легковые</option>
                                <option value="2" @selected(($user->vehicle->vehicleType ?? 0) == 2)>Грузовые</option>
                                <option value="3" @selected(($user->vehicle->vehicleType ?? 0) == 3)>Мотоциклы</option>
                            </select>
                        </div>
                        <div class="w-100">
                            <label for="vehicleBrand" class="form-label">Марка авто</label>
                            <select class="form-select" id="vehicleBrand" name="brand" disabled>
                                <option value="0" @selected(($user->vehicle->brand ?? 0) == 0)>Не выбрано</option>
                                <option value="1" @selected(($user->vehicle->brand ?? 0) == 1)>Toyota</option>
                                <option value="2" @selected(($user->vehicle->brand ?? 0) == 2)>Vaz</option>
                                <option value="3" @selected(($user->vehicle->brand ?? 0) == 3)>Kamaz</option>
                                <option value="4" @selected(($user->vehicle->brand ?? 0) == 4)>YAMAHA</option>
                            </select>
                        </div>
                        <div class="w-100">
                            <label for="vehicleModel" class="form-label">Модель авто</label>
                            <select class="form-select" id="vehicleModel" name="model" disabled>
                                <option value="0" @selected(($user->vehicle->model ?? 0) == 0)>Не выбрано</option>
                                <option value="1" @selected(($user->vehicle->model ?? 0) == 1)>Corolla</option>
                                <option value="2" @selected(($user->vehicle->model ?? 0) == 2)>RAV4</option>
                                <option value="3" @selected(($user->vehicle->model ?? 0) == 3)>21014</option>
                                <option value="4" @selected(($user->vehicle->model ?? 0) == 4)>21015</option>
                                <option value="5" @selected(($user->vehicle->model ?? 0) == 5)>КАМАЗ-65224</option>
                                <option value="6" @selected(($user->vehicle->model ?? 0) == 6)>KAMAZ-5490</option>
                                <option value="7" @selected(($user->vehicle->model ?? 0) == 7)>Yamaha NEO's</option>
                                <option value="8" @selected(($user->vehicle->model ?? 0) == 8)>Yamaha NMAX 125</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between gap-3">
                        <div class="w-100">
                            <label for="vin" class="form-label">Vin</label>
                            <input type="text" class="form-control" id="vin" name="vin"
                                value="{{ $user->vehicle->vin ?? '' }}" disabled />
                        </div>

                        <div class="w-100">
                            <label for="bodyNumber" class="form-label">Номер кузова</label>
                            <input type="text" class="form-control" id="bodyNumber" name="bodyNumber"
                                value="{{ $user->vehicle->bodyNumber ?? '' }}" disabled />
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between gap-3">
                        <div class="w-100">
                            <label for="power" class="form-label">Мощьность (л.с.)</label>
                            <input type="text" class="form-control" id="power" name="power"
                                value="{{ $user->vehicle->power ?? '' }}" disabled />
                        </div>
                        <div class="w-100">
                            <label for="color" class="form-label">Цвет</label>
                            <select class="form-select" id="color" name="color" disabled>
                                <option value="0" @selected(($user->vehicle->color ?? 0) == 0)>Не выбрано</option>
                                <option value="1" @selected(($user->vehicle->color ?? 0) == 1)>бирюзовый</option>
                                <option value="2" @selected(($user->vehicle->color ?? 0) == 2)>черный</option>
                                <option value="3" @selected(($user->vehicle->color ?? 0) == 3)>белый</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <h5>Паспорт ТС</h5>
            <div class="row">
                <div class="col">
                    <div class="mb-3 d-flex justify-content-between gap-3">
                        <div class="w-25">
                            <label for="ptsType" class="form-label">Тип</label>
                            <select class="form-select" id="ptsType" name="ptsType" disabled>
                                <option value="1" @selected(($user->vehicle->ptsType ?? 1) == 1) selected>ПТС</option>
                            </select>
                        </div>
                        <div class="w-50">
                            <label for="ptsSeries" class="form-label">Серия</label>
                            <input type="text" class="form-control" id="ptsSeries" name="ptsSeries"
                                value="{{ $user->vehicle->ptsSeries ?? '' }}" disabled />
                        </div>
                        <div class="w-50">
                            <label for="ptsNumber" class="form-label">Номер</label>
                            <input type="text" class="form-control" id="ptsNumber" name="ptsNumber"
                                value="{{ $user->vehicle->ptsNumber ?? '' }}" disabled />
                        </div>

                        <div class="w-100">
                            <label for="ptsIssueDate" class="form-label">Дата выдачи</label>
                            <input type="date" class="form-control" id="ptsIssueDate" name="ptsIssueDate"
                                value="{{ $user->vehicle->ptsIssueDate ?? '' }}" disabled />
                        </div>
                    </div>
                    <div class="col">
                        <label for="vehicleYear" class="form-label">Год выпуска ТС</label>
                        <input type="number" class="form-control" id="vehicleYear" name="vehicleYear"
                            value="{{ $user->vehicle->vehicleYear ?? '' }}" disabled />
                    </div>
                </div>
            </div>

            <hr />
            <h5>Свидетельство о регистрации ТС</h5>
            <div class="row">
                <div class="col">
                    <div class="mb-3 d-flex justify-content-between gap-3">
                        <div class="w-100">
                            <label for="regSeries" class="form-label">Серия</label>
                            <input type="text" class="form-control" id="regSeries" name="regSeries"
                                value="{{ $user->vehicle->regSeries ?? '' }}" disabled />
                        </div>
                        <div class="w-100">
                            <label for="regNumber" class="form-label">Номер</label>
                            <input type="text" class="form-control" id="regNumber" name="regNumber"
                                value="{{ $user->vehicle->regNumber ?? '' }}" disabled />
                        </div>
                        <div class="w-100">
                            <label for="ptsIssueDate" class="form-label">Дата выдачи</label>
                            <input type="date" class="form-control" id="ptsIssueDate" name="ptsIssueDate"
                                value="{{ $user->vehicle->ptsIssueDate ?? '' }}" disabled />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 d-flex justify-content-between gap-3">
                            <div class="w-50">
                                <label for="regCountry" class="form-label">Страна регистрации</label>
                                <select class="form-select" id="regCountry" name="regCountry" disabled>
                                    <option value="0" @selected(($user->vehicle->regCountry ?? 0) == 0)>Не выбрано</option>
                                    <option value="1" @selected(($user->vehicle->regCountry ?? 0) == 1)>Россия</option>
                                    <option value="2" @selected(($user->vehicle->regCountry ?? 0) == 2)>Белоруссия</option>
                                    <option value="3" @selected(($user->vehicle->regCountry ?? 0) == 3)>Казахстан</option>
                                </select>
                            </div>

                            <div class="w-50">
                                <label for="regPlate" class="form-label">Регистрационный номер</label>
                                <input type="text" class="form-control" id="regPlate" name="regPlate"
                                    value="{{ $user->vehicle->regPlate ?? '' }}" disabled />
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="usagePurpose" class="form-label">Цель использования</label>
                <select class="form-select" id="usagePurpose" name="usagePurpose" disabled>
                    <option value="0" @selected(($user->vehicle->usagePurpose ?? 0) == 0)>Не выбрано</option>
                    <option value="1" @selected(($user->vehicle->usagePurpose ?? 0) == 1)>Личная</option>
                    <option value="2" @selected(($user->vehicle->usagePurpose ?? 0) == 2)>Прокат</option>
                    <option value="3" @selected(($user->vehicle->usagePurpose ?? 0) == 3)>Такси</option>
                </select>
            </div>
            <div>
                <button type="button" id="editBtn" class="btn btn-primary">Редактировать</button>
                <button type="submit" id="saveBtn" class="btn btn-success d-none">Сохранить</button>
            </div>
        </form>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#editBtn').on('click', function() {
            $('#insuranceForm').find('input, select').prop('disabled', false);
            $('#editBtn').addClass('d-none');
            $('#saveBtn').removeClass('d-none');
            $('#js-fill-btn').removeClass('d-none');

            attachFillFakeDataHandler();
        });

        $('#saveBtn').on('click', function(e) {
            e.preventDefault();

            let vehicleData = {
                vehicleType: $('select[name="vehicleType"]').val(),
                brand: $('select[name="brand"]').val(),
                model: $('select[name="model"]').val(),
                vin: $('input[name="vin"]').val(),
                bodyNumber: $('input[name="bodyNumber"]').val(),
                power: $('input[name="power"]').val(),
                color: $('select[name="color"]').val(),
                ptsType: $('select[name="ptsType"]').val(),
                ptsSeries: $('input[name="ptsSeries"]').val(),
                ptsNumber: $('input[name="ptsNumber"]').val(),
                ptsIssueDate: $('input[name="ptsIssueDate"]').val(),
                vehicleYear: $('input[name="vehicleYear"]').val(),
                regSeries: $('input[name="regSeries"]').val(),
                regNumber: $('input[name="regNumber"]').val(),
                regCountry: $('select[name="regCountry"]').val(),
                regPlate: $('input[name="regPlate"]').val(),
                usagePurpose: $('select[name="usagePurpose"]').val()
            };

            $.ajax({
                url: '/dashboard/auto',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    vehicle: vehicleData
                }),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function() {
                    $('#insuranceForm').find('input, select').prop('disabled', true);
                    $('#editBtn').removeClass('d-none');
                    $('#saveBtn').addClass('d-none');
                    $('#js-fill-btn').addClass('d-none');
                }
            });
        });

        function attachFillFakeDataHandler() {
            $('#js-fill-btn').off('click').on('click', function() {
                const fakeVariants = [{
                        vehicleType: "1",
                        brand: "1",
                        model: "1",
                        vin: "JTDBR32E720068421",
                        bodyNumber: "KU12345678",
                        power: "150",
                        color: "2",
                        ptsType: "1",
                        ptsSeries: "77АА",
                        ptsNumber: "123456",
                        ptsIssueDate: "2020-05-15",
                        vehicleYear: "2019",
                        regSeries: "77ВВ",
                        regNumber: "654321",
                        regIssueDate: "2021-06-20",
                        regCountry: "1",
                        regPlate: "А123ВС77",
                        usagePurpose: "1"
                    },
                    {
                        vehicleType: "2",
                        brand: "3",
                        model: "5",
                        vin: "XTA210140L1234567",
                        bodyNumber: "KAM654321",
                        power: "240",
                        color: "3",
                        ptsType: "1",
                        ptsSeries: "50СС",
                        ptsNumber: "987654",
                        ptsIssueDate: "2018-03-12",
                        vehicleYear: "2018",
                        regSeries: "50DD",
                        regNumber: "112233",
                        regIssueDate: "2019-07-11",
                        regCountry: "2",
                        regPlate: "М456ОР50",
                        usagePurpose: "2"
                    },
                    {
                        vehicleType: "3",
                        brand: "4",
                        model: "7",
                        vin: "JYARN23E3KA012345",
                        bodyNumber: "YM9876543",
                        power: "45",
                        color: "1",
                        ptsType: "1",
                        ptsSeries: "10ЕЕ",
                        ptsNumber: "445566",
                        ptsIssueDate: "2022-01-05",
                        vehicleYear: "2021",
                        regSeries: "10FF",
                        regNumber: "778899",
                        regIssueDate: "2022-02-10",
                        regCountry: "3",
                        regPlate: "Р789КУ10",
                        usagePurpose: "3"
                    }
                ];

                const randomData = fakeVariants[Math.floor(Math.random() * fakeVariants.length)];

                $('#insuranceForm').find('input, select').each(function() {
                    const name = $(this).attr('name');
                    if (name && randomData.hasOwnProperty(name)) {
                        $(this).val(randomData[name]);
                    }
                });
            });
        }
    });
</script>
