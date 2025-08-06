<div class="sidebar-brand">
    <a href="#" class="brand-link">
        <span class="brand-text fw-light">ПРОФИТ Страхование</span>
    </a>
</div>
<div class="sidebar-wrapper">
    <nav class="mt-2">
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('me') }}" class="nav-link">
                    <i class="bi bi-person-vcard"></i>
                    <p>Личная информация</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('bills') }}" class="nav-link">
                    <i class="bi bi-cash"></i>
                    <p>Электронный счет</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('auto')}}" class="nav-link">
                    <i class="bi bi-car-front-fill"></i>
                    <p>Сведения об авто</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('policies') }}" class="nav-link">
                    <i class="bi bi-files"></i>
                    <p>Мои Полисы</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('osago') }}" class="nav-link">
                    <i class="bi bi-file-text"></i>
                    <p>Оформить ОСАГО</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
