<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ПРОФИТ</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('images/site.webmanifest') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <header>
        <div class="container layout pb-3 pt-3">
            <div class="d-flex">
                <a class="navbar-brand" href="#"><span class="text-white p-2"
                        style="background-color: #113a5d; border-radius:20px;">ПРОФИТ</span></a>
                <div class="d-flex justify-content-between w-100">
                    <ul class="d-flex ps-0 m-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Частным лицам</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Бизнесу</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Премиум</a>
                        </li>
                    </ul>
                    <div>
                        <button id="authModalBtn" class="nav-link text-uppercase"
                            style="border:none; outline:none;"><span class="p-2 text-white rounded"
                                style="background-color: #1275ca;">Личный кабинет
                            </span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container layout layout-rounded">
            <div class="header">
                <div class="header-wrapper d-flex">
                    <div class="header__left-side w-100">
                        <div class="flex-column">
                            <div class="left-side-title pb-5">
                                <p class="title title-color">Профит<span
                                        class="left-side-title-second">Страхование</span>
                                </p>
                            </div>
                            <div>
                                <p class="fs-3 fw-bolder pb-3">Делаем жизнь комфортней</p>
                                <p class="fs-4 pb-1">Оформите полис ОСАГО в <strong>личном кабинете</strong></p>
                                <p class="fs-4">Присоединяйтесь к 2 млн
                                    клиентов, чья жизнь стала комфортнее</p>
                            </div>

                        </div>
                    </div>
                    <div class=header__right-side>
                        <img class="header-img" src="{{ asset('images/header-img.png') }}" class="img-thumbnail"
                            alt="image">
                    </div>
                </div>
                <div class="header-bottom w-100">
                    <ul class="header-bottom-cards list-reset d-flex justify-content-around">
                        <li class="header-bottom__cards-list">
                            <div class="header-bottom__cards-text">
                                <p class="cards-list-descr descr">Рассчитайте и оплатите полис в личном кабинете</p>
                            </div>
                            <span><svg width="24" height="22" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.423 0.00105033C11.0474 -0.0133911 10.6739 0.121564 10.3925 0.376428C10.1684 0.579378 10.0162 0.84619 9.95698 1.13824L9.9349 1.30295L9.92986 1.44914L10.3741 7.97348C10.4295 8.80509 11.1615 9.43818 12.0133 9.39005L18.6588 8.95674C19.0477 8.92862 19.4041 8.75241 19.6545 8.46677C19.8538 8.23931 19.9737 7.95621 19.9977 7.65855L20 7.4567L19.9904 7.34084C19.3029 3.20162 15.7085 0.122269 11.423 0.00105033ZM11.4113 1.44902L11.6287 1.45932C15.0119 1.66443 17.8318 4.0802 18.4854 7.33352L18.5182 7.51352L11.9214 7.94502C11.888 7.94688 11.8537 7.91719 11.8511 7.87814L11.4113 1.44902ZM6.7814 3.84532C7.502 3.74681 8.21097 4.12453 8.49776 4.7606C8.58545 4.93485 8.63817 5.12392 8.65332 5.32102L9.04185 10.8095C9.04706 10.8847 9.08269 10.9548 9.14085 11.0042C9.18448 11.0413 9.23808 11.0645 9.29801 11.0712L9.35991 11.0724L14.9341 10.7366C15.3867 10.71 15.8305 10.8675 16.1604 11.1719C16.4902 11.4763 16.6768 11.9004 16.6744 12.3912C16.4265 16.0037 13.773 19.0237 10.159 19.8065C6.54503 20.5893 2.83611 18.9474 1.05781 15.7848C0.582292 14.9695 0.261779 14.0778 0.113798 13.1749L0.0664268 12.8359C0.0253023 12.5821 0.00319023 12.3257 0 12.0795L0.00311369 11.8372C0.0133983 8.06546 2.66156 4.80403 6.38809 3.92434L6.64383 3.86807L6.7814 3.84532ZM7.01643 5.27813L6.93217 5.28772L6.70369 5.33933C3.73526 6.05478 1.6062 8.6103 1.48796 11.621L1.4828 11.8661C1.47569 12.0525 1.4825 12.2392 1.50499 12.4378L1.53277 12.6408C1.63212 13.495 1.90795 14.3206 2.34914 15.0772C3.81632 17.6863 6.86669 19.0367 9.839 18.3929C12.8113 17.7491 14.9936 15.2653 15.1958 12.3414C15.1959 12.2974 15.1774 12.2552 15.1446 12.225C15.1228 12.2049 15.0959 12.1912 15.0675 12.1851L15.024 12.1817L9.45904 12.5169C8.98938 12.5503 8.52549 12.3992 8.17003 12.0971C7.81456 11.7951 7.59684 11.3669 7.56522 10.91L7.17702 5.42617C7.17632 5.41708 7.17385 5.40822 7.15682 5.37299C7.1315 5.31695 7.07648 5.28131 7.01643 5.27813Z"
                                        fill="#0962E8" />
                                </svg></span>
                        </li>
                        <li class="header-bottom__cards-list">
                            <div class="header-bottom__cards-text">
                                <p class="cards-list-descr descr">В любом регионе страхование выплаты за 1 день</p>
                            </div>
                            <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.8212 4.58138C16.8212 3.15572 17.9805 2 19.4106 2C20.8407 2 22 3.15572 22 4.58138C22 6.00703 20.8407 7.16275 19.4106 7.16275C17.9805 7.16275 16.8212 6.00703 16.8212 4.58138ZM20.5465 4.58138C20.5465 3.95599 20.0379 3.44902 19.4106 3.44902C18.7833 3.44902 18.2747 3.95599 18.2747 4.58138C18.2747 5.20676 18.7833 5.71373 19.4106 5.71373C20.0379 5.71373 20.5465 5.20676 20.5465 4.58138ZM15.5277 9.54022C15.7736 9.22392 16.2301 9.16618 16.5473 9.41126C16.8358 9.63406 16.9099 10.0304 16.7363 10.3383L16.6767 10.4277L13.8384 14.0796C13.6139 14.3685 13.2139 14.4415 12.9047 14.2658L12.815 14.2056L10.0835 12.0668L7.63115 15.2448C7.40864 15.5331 7.01131 15.6083 6.7019 15.4363L6.61198 15.3772C6.32279 15.1554 6.24735 14.7593 6.41992 14.4508L6.47916 14.3612L9.37954 10.6032C9.60364 10.3129 10.0046 10.239 10.3145 10.415L10.4045 10.4753L13.1368 12.6155L15.5277 9.54022ZM15.2236 3.53799C15.2236 3.13786 14.8982 2.81348 14.4968 2.81348H7.45429L7.22732 2.81726C4.07521 2.92283 2 5.23062 2 8.50732V16.315L2.00348 16.5481C2.10063 19.7878 4.2269 22 7.45429 22H15.7918L16.0188 21.9962C19.1721 21.891 21.2461 19.5901 21.2461 16.315V9.51534L21.2394 9.41702C21.1913 9.06339 20.8872 8.79083 20.5193 8.79083C20.1179 8.79083 19.7926 9.1152 19.7926 9.51534V16.315L19.7886 16.5399C19.7007 18.9868 18.1725 20.551 15.7918 20.551H7.45429L7.2384 20.5467C4.89102 20.4534 3.45352 18.8291 3.45352 16.315V8.50732L3.45752 8.28224C3.54548 5.83278 5.07567 4.2625 7.45429 4.2625H14.4968L14.5954 4.25589C14.9502 4.20791 15.2236 3.90478 15.2236 3.53799Z"
                                        fill="#0962E8" />
                                </svg></span>
                        </li>
                        <li class="header-bottom__cards-list">
                            <div class="header-bottom__cards-text">
                                <p class="cards-list-descr descr">Без справок можно оформить ремонт стекол</p>
                            </div>
                            <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.94945 2.5C3.76837 2.5 2 4.26322 2 6.43714C2 8.61016 3.76859 10.3732 5.94945 10.3732C8.13031 10.3732 9.89889 8.61016 9.89889 6.43714C9.89889 4.26322 8.13052 2.5 5.94945 2.5ZM5.94945 4.00741C7.295 4.00741 8.38634 5.09557 8.38634 6.43714C8.38634 7.77772 7.29487 8.86575 5.94945 8.86575C4.60403 8.86575 3.51255 7.77772 3.51255 6.43714C3.51255 5.09557 4.6039 4.00741 5.94945 4.00741ZM21.9997 6.43714C21.9997 6.02088 21.6611 5.68343 21.2434 5.68343H13.5652L13.4626 5.69031C13.0935 5.74022 12.8089 6.05557 12.8089 6.43714C12.8089 6.8534 13.1475 7.19085 13.5652 7.19085H21.2434L21.346 7.18397C21.7151 7.13406 21.9997 6.81871 21.9997 6.43714ZM14.1011 17.564C14.1011 15.3902 15.8693 13.628 18.0506 13.628C20.2318 13.628 22 15.3902 22 17.564C22 19.7378 20.2318 21.5 18.0506 21.5C15.8693 21.5 14.1011 19.7378 14.1011 17.564ZM20.4874 17.564C20.4874 16.2227 19.3964 15.1354 18.0506 15.1354C16.7047 15.1354 15.6137 16.2227 15.6137 17.564C15.6137 18.9052 16.7047 19.9926 18.0506 19.9926C19.3964 19.9926 20.4874 18.9052 20.4874 17.564ZM11.1912 17.564C11.1912 17.1477 10.8526 16.8103 10.4349 16.8103H2.75673L2.6541 16.8171C2.28496 16.8671 2.00045 17.1824 2.00045 17.564C2.00045 17.9802 2.33904 18.3177 2.75673 18.3177H10.4349L10.5375 18.3108C10.9067 18.2609 11.1912 17.9455 11.1912 17.564Z"
                                        fill="#0962E8" />
                                </svg>
                            </span>
                        </li>
                        <li class="header-bottom__cards-list">
                            <div class="header-bottom__cards-text">
                                <p class="cards-list-descr descr">Эвакуация на сумму до 10000 рублей при ДТП</p>
                            </div>
                            <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.6161 2H11.3811C10.6855 2 10.0186 2.27155 9.52796 2.75457C9.09307 3.1827 8.82704 3.74716 8.77575 4.34781L8.76724 4.54181C8.75775 5.17352 8.24742 5.66634 7.62101 5.66628C7.47895 5.6648 7.33141 5.63238 7.19559 5.5713L7.06235 5.50171C5.83155 4.81017 4.23128 5.23376 3.50918 6.46166L2.85989 7.50695C2.16949 8.68048 2.51001 10.1548 3.62449 10.9141L3.77948 11.0115C4.16149 11.2284 4.37987 11.599 4.37987 12C4.37987 12.3688 4.19491 12.7137 3.88645 12.9228L3.78115 12.9875C2.62651 13.6412 2.17157 15.0841 2.75197 16.2844L2.83679 16.4442L3.47412 17.5224C3.80539 18.1083 4.37306 18.5497 5.04445 18.7366C5.63953 18.9023 6.2746 18.8565 6.83762 18.6084L7.01565 18.5213C7.31529 18.3516 7.62484 18.3109 7.91538 18.3871C8.20591 18.4633 8.45336 18.65 8.6027 18.9057C8.68504 19.0418 8.73337 19.1822 8.75063 19.3277L8.75912 19.4753C8.75765 20.8493 9.93219 22 11.3811 22H12.6164C13.9845 22 15.12 20.9703 15.231 19.6414L15.2391 19.4698C15.2383 19.1379 15.3582 18.8524 15.5727 18.6422C15.7872 18.432 16.0786 18.3146 16.382 18.316C16.5214 18.3199 16.6746 18.3541 16.8166 18.4163L16.9527 18.485C18.1011 19.1344 19.6058 18.8008 20.3808 17.7089L20.4803 17.557L21.1399 16.4804C21.495 15.8833 21.5912 15.1817 21.4119 14.523C21.253 13.9391 20.8887 13.4297 20.3843 13.0841L20.2174 12.9793C19.9272 12.8149 19.736 12.5708 19.658 12.2844C19.58 11.998 19.6218 11.6929 19.7742 11.4368C19.8585 11.2926 19.9706 11.1726 20.1051 11.0807L20.3624 10.9223C21.4043 10.2293 21.7945 8.86519 21.2461 7.71842L21.1892 7.60674C21.1769 7.57762 21.1627 7.54922 21.1465 7.52174L20.5333 6.47928C19.8511 5.31918 18.3759 4.86897 17.146 5.4355L16.9821 5.51839C16.6882 5.68688 16.3779 5.72947 16.0857 5.65514C15.7935 5.58081 15.5435 5.39567 15.3908 5.14055C15.3124 5.01116 15.2641 4.87079 15.2468 4.72535L15.2383 4.57766C15.2599 3.94968 14.9925 3.27681 14.4983 2.77871C14.0041 2.28061 13.3251 1.99971 12.6161 2ZM11.3811 3.44774H12.6164C12.9264 3.44761 13.2229 3.57029 13.4387 3.78783C13.6546 4.00537 13.7713 4.29923 13.7624 4.60249L13.7756 4.85454C13.8203 5.23984 13.9357 5.57504 14.1181 5.87616C14.4673 6.45965 15.0423 6.88546 15.7143 7.05641C16.3863 7.22736 17.1001 7.12941 17.6983 6.78415L17.8015 6.73265L17.9125 6.6891C18.4009 6.52853 18.9764 6.73175 19.253 7.20208L19.8378 8.19726L19.8505 8.22529L19.9212 8.35884C20.1578 8.85504 19.9601 9.4827 19.448 9.77613L19.2873 9.87532C18.9464 10.1073 18.6849 10.3872 18.4946 10.7126C18.1471 11.2971 18.0509 11.9987 18.2302 12.6574C18.3932 13.2563 18.7716 13.7748 19.2922 14.1195L19.5645 14.2882C19.7566 14.4207 19.915 14.6422 19.9841 14.896C20.0621 15.1824 20.0203 15.4875 19.868 15.7436L19.2236 16.7957L19.1511 16.9067C18.8529 17.3258 18.2647 17.4814 17.7687 17.2682L17.4528 17.11C17.1004 16.9547 16.7556 16.8778 16.4053 16.8686C15.6914 16.865 15.0212 17.1351 14.5279 17.6185C14.0345 18.1019 13.7588 18.7585 13.7621 19.4421L13.7565 19.5511C13.7099 20.1023 13.2137 20.5523 12.6164 20.5523H11.3811C10.7905 20.5523 10.3043 20.1145 10.2421 19.552L10.2219 19.1985C10.1772 18.8132 10.0618 18.478 9.87937 18.1768C9.54028 17.5959 8.96861 17.1645 8.29737 16.9886C7.62614 16.8126 6.91096 16.9066 6.3108 17.2497L6.20208 17.3018C5.98569 17.3964 5.70831 17.4164 5.44842 17.344C5.1552 17.2624 4.90728 17.0696 4.75952 16.8084L4.13027 15.7449L4.07398 15.6383C3.83562 15.144 4.03354 14.5163 4.54639 14.2256L4.70219 14.1296C5.43413 13.634 5.85754 12.8446 5.85754 12C5.85754 11.1429 5.42197 10.3467 4.70395 9.871L4.44324 9.70925C3.98256 9.39466 3.83377 8.75044 4.13128 8.24455L4.78057 7.19925C5.1049 6.64815 5.8038 6.46315 6.3519 6.77085L6.54427 6.87026C6.90355 7.03293 7.25588 7.11034 7.61326 7.11398C8.99969 7.11416 10.1334 6.07087 10.2368 4.7415L10.2503 4.43661C10.2706 4.20741 10.3863 3.96196 10.5753 3.77582C10.7887 3.56581 11.0786 3.44774 11.3811 3.44774ZM12.0032 8.73182C10.161 8.73182 8.66748 10.195 8.66748 12C8.66748 13.805 10.161 15.2682 12.0032 15.2682C13.8455 15.2682 15.339 13.805 15.339 12C15.339 10.195 13.8455 8.73182 12.0032 8.73182ZM12.0032 10.1796C13.0294 10.1796 13.8613 10.9946 13.8613 12C13.8613 13.0054 13.0294 13.8204 12.0032 13.8204C10.977 13.8204 10.1452 13.0054 10.1452 12C10.1452 10.9946 10.977 10.1796 12.0032 10.1796Z"
                                        fill="#0962E8" />
                                </svg></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container mt-2">
            <section class="pt-5">

                <div class="main__title mb-0">
                    <h2 class="title main__title-layout">Все наши <span> страховые продукты</span></h2>
                </div>

                <div class="main__group justify-content-between">
                    <div class="mt-4">
                        <div class="row g-4 justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 border border-3 layout" style="border-radius:10px">
                                    <img src="{{ asset('images/casco.png') }}" class="card-img-top img-fluid"
                                        style="height:300px; max-height: 300px; object-fit: contain;" alt="image">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fs-3 fw-bolder pb-3">Автострахование КАСКО</h5>
                                        <p class="card-text">Расчет стоимости полиса на онлайн-калькуляторе за 1 минуту
                                        </p>
                                        <div class="mt-auto">
                                            <a href="#" class="btn btn-primary text-white"
                                                style="background-color: #113a5d; border-color: #d7eafd;">Рассчитать
                                                стоимость</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 border border-3 layout" style="border-radius:10px">
                                    <img src="{{ asset('images/tourist.png') }}" class="card-img-top img-fluid"
                                        style="height:300px; max-height: 300px; object-fit: contain;" alt="image">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fs-3 fw-bolder pb-3">Страхование для туристов</h5>
                                        <p class="card-text">Расчет стоимости полиса на онлайн-калькуляторе за 1 минуту
                                        </p>
                                        <div class="mt-auto">
                                            <a href="#" class="btn btn-primary text-white"
                                                style="background-color: #113a5d; border-color: #d7eafd;">Рассчитать
                                                стоимость</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 border border-3 layout" style="border-radius:10px">
                                    <img src="{{ asset('images/property.png') }}" class="card-img-top img-fluid"
                                        style="height:300px; max-height: 300px; object-fit: contain;" alt="image">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fs-3 fw-bolder pb-3">Страхование недвижимости</h5>
                                        <p class="card-text">Расчет стоимости полиса на онлайн-калькуляторе за 1 минуту
                                        </p>
                                        <div class="mt-auto">
                                            <a href="#" class="btn btn-primary text-white"
                                                style="background-color: #113a5d; border-color: #d7eafd;">Рассчитать
                                                стоимость</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
        <div class="mb-3" style="display: none; min-width:500px; height:auto;" id="authModal">
            <div class="tabs text-center mb-3">
                <button id="loginTabBtn" class="text-uppercase border p-3 me-3 border-5 rounded tabs-active"
                    onclick="switchTab('login')">Вход</button>
                <button id="registerTabBtn" class="text-uppercase border p-3 border-5 rounded"
                    onclick="switchTab('register')">Регистрация</button>
            </div>
            <div class="pt-2" id="login-form" style="max-width: 500px; width: 100%;">
                <form id="loginForm" autocomplete="off">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="email" name="fakeemail" style="display:none">
                        <label class="pb-1" for="login-email">Адрес электронной почты</label>
                        <input type="email" name="email" class="form-control" id="login-email"
                            aria-describedby="emailHelp" placeholder="example@mail.ru" autocomplete="new-email" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="fakepasswordremembered" style="display:none">
                        <label class="pb-1" for="login-password">Пароль</label>
                        <input type="password" name="password" class="form-control" id="login-password"
                            placeholder="Password" autocomplete="new-password" required>
                    </div>
                    <button class="btn" type="submit"
                        style="background-color: #113a5d; border-color: #d7eafd;">Войти</button>
                </form>
                <div id="login-msg" class="p-3 text-center"></div>
            </div>

            <div id="register-form" style="display:none; max-width: 500px; width: 100%;">
                <form id="registerForm" autocomplete="off">
                    @csrf
                    <div class="form-group mb-3">                        
                        <label class="pb-1" for="register-name">Имя</label>
                        <input type="text" name="name" class="form-control" id="register-name"
                            placeholder="Иванов Иван" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="fakeemail" style="display:none">
                        <label class="pb-1" for="register-email">Адрес электронной почты</label>
                        <input type="email" name="email" class="form-control" id="register-email"
                            aria-describedby="emailHelp" placeholder="example@mail.ru" autocomplete="new-email" required>
                    </div>
                    <div class="form-group mb-3">
                         <input type="password" name="fakepasswordremembered" style="display:none">
                        <label class="pb-1" for="register-password">Пароль</label>
                        <input type="password" name="password" class="form-control" 
                            id="register-password" placeholder="Password" autocomplete="new-password" required>
                    </div>                    
                    <button class="btn" type="submit"
                        style="background-color: #113a5d; border-color: #d7eafd;">Зарегистрироваться</button>
                </form>
                <div id="reg-msg" class="p-3 text-center text-danger"
                    style="word-wrap: break-word; overflow-wrap: break-word; max-width: 100%;"></div>
            </div>
        </div>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        // Открытие модального окна
        document.getElementById('authModalBtn').addEventListener('click', function() {
            Fancybox.show([{
                src: "#authModal",
                type: "inline",
            }]);
        });

        // Переключение вкладок
        function switchTab(tab) {
            const loginTab = document.getElementById('loginTabBtn');
            const registerTab = document.getElementById('registerTabBtn');

            if (tab === 'login') {
                document.getElementById('login-form').style.display = 'block';
                document.getElementById('register-form').style.display = 'none';

                loginTab.classList.add('tabs-active');
                registerTab.classList.remove('tabs-active');
            } else {
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('register-form').style.display = 'block';

                loginTab.classList.remove('tabs-active');
                registerTab.classList.add('tabs-active');
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            function clearFormMessages() {
                $('#reg-msg, #login-msg').text('').removeClass('text-danger text-success');
            }

            $('#registerForm, #loginForm').on('focus input', 'input, select, textarea', clearFormMessages);


            document.getElementById('loginForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                try {

                    const response = await fetch('/login', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        },
                        body: formData
                    });

                    const result = await response.json();
                    console.log(result);
                    
                    if (response.ok && result.access_token) {
                        localStorage.setItem('access_token', result.access_token);
                        Fancybox.close();
                        window.location.href = '/dashboard';
                    } else {
                        $('#login-msg').text(result.message || 'Ошибка регистрации').addClass(
                            'text-danger');
                    }
                } catch (error) {
                    console.error(error);
                    $('#login-msg').text('Ошибка соединения с сервером.').addClass('text-danger');
                }
            });

            document.getElementById('registerForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                try {
                    const response = await fetch('/register', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.ok && result.user) {
                        this.reset();
                        switchToLoginForm(result.user.email);
                    } else {
                        $('#reg-msg').text(result.message || 'Ошибка регистрации').addClass(
                            'text-danger');
                    }
                } catch (error) {
                    console.error(error);
                    $('#reg-msg').text('Ошибка соединения с сервером.').addClass('text-danger');
                }
            });

            function switchToLoginForm(email) {
                $('#login-msg').text('Введите пароль для входа в приложение').addClass('text-success');
                $('#login-email').val(email);
                $('#login-password').val('');

                $('#register-form').hide();
                $('#login-form').show();

                $('#registerTabBtn').removeClass('tabs-active');
                $('#loginTabBtn').addClass('tabs-active');
            }
        });
    </script>
</body>

</html>
