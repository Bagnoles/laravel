
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/info">О проекте</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news">Новости</a>
                </li>
                @if (Auth::user()?->is_admin === true)
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Админка</a>
                </li>
                @endif
