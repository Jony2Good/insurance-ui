@extends('dashboard.main')

@section('content')
    @php
        $user = \App\Models\User::findOrFail(auth()->id());
    @endphp
    <div class="container">
        <h3>Виртуальный счет</h3>
        <form id="billingForm" class="d-flex flex-row gap-3">
            <div class="w-25 d-flex flex-column justify-content-between">
                <label for="billing" class="form-label">Необходим для оплаты полиса</label>
                <input type="text" class="form-control" id="billing" name="balance" value="{{ $balance ?? $user->balance ?? 0 }}"
                    disabled />
            </div>
            <div class="align-self-end">
                <button type="button" id="editBtn" class="btn btn-primary">Редактировать</button>
                <button type="submit" id="saveBtn" class="btn btn-success d-none">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#editBtn').on('click', function() {
            $('#billingForm input').prop('disabled', false);
            $('#editBtn').addClass('d-none');
            $('#saveBtn').removeClass('d-none');
        });

        $('#saveBtn').on('click', function(e) {
            e.preventDefault();
            let balanceData = {
                balance: $('input[name="balance"]').val(),
            };

            $.ajax({
                url: '/dashboard/bills',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    balance: balanceData
                }),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.user && response.user.balance !== undefined) {
                        $('#billing').val(response.user.balance);
                    }
                    $('#billingForm input').prop('disabled', true);
                    $('#editBtn').removeClass('d-none');
                    $('#saveBtn').addClass('d-none');
                }
            });
        });
    });
</script>
