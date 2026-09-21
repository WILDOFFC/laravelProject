<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-name')</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="py-3 mb-3 border-bottom ">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
            <!-- <div class="dropdown"> <a href="#"
                class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-body-emphasis text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false" aria-label="Bootstrap menu">SEO
                <use xlink:href="#bootstrap"></use>
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li><a class="dropdown-item active" href="#" aria-current="page">Overview</a></li>
                <li><a class="dropdown-item" href="#">в</a></li>
                <li><a class="dropdown-item" href="#">Customers</a></li>
                <li><a class="dropdown-item" href="#">Products</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Reports</a></li>
                <li><a class="dropdown-item" href="#">Analytics</a></li>
            </ul>
        </div> -->
            <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
                <a href="/" class="logo">SEO</a>
            </div>
            <div class="d-flex align-items-center">
                <form class="w-100 me-3" role="search" action='{{ route('search') }}'> <input type="search"
                        class="form-control text-danger" style="color: red;" placeholder="Поиск..." name="search"
                        aria-label="Search"> </form>
                <div class="col-lg-4">
                    <div class="btn">
                        <a href="">Избранное</a>
                    </div>
                    <div class="btn">
                        <a href="">Заказы</a>
                    </div>
                </div>
                @if (Auth::check())
                    <div class="flex-shrink-0 dropdown"> <a href="#"
                            class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt="mdo"
                                width="32" height="32" class="rounded-circle"> </a>
                        <ul class="dropdown-menu text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                <a href="{{ route('auth.login') }}" class="btn btn-primary">Войти</a>
                @endif
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="container">
            <footer class="py-5">
                <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                        <h5 style="color: red;">О нас</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Представители</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">ВЫ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <h5 style="color: red;">Покупателям</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Доставка</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Оригинальность товаров</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Новости</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">ВВВ</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">AboВВut</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Подпишитесь на новости</h5>
                            <p>Получайте информацию об обновлениях сайта!</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2"> <label for="newsletter1"
                                    class="visually-hidden">Адрес электронной почты</label> <input id="newsletter1"
                                    type="email" class="form-control" placeholder="Адрес электронной почты"> <button
                                    class="btn btn-primary" style="background-color: red; border: red;"
                                    type="button">Подписаться</button> </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top"
                    style="border-color: red;">
                    <p>© 2026</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-body-emphasis" href="#" aria-label="Instagram"><svg class="bi"
                                    width="24" height="24">
                                    <use xlink:href="#instagram"></use>
                                </svg></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#" aria-label="Facebook"><svg class="bi"
                                    width="24" height="24" aria-hidden="true">
                                    <use xlink:href="#facebook"></use>
                                </svg></a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </footer>
</body>

</html>