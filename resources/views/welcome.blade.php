<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Default Title')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        </head>




        <div style="padding-left: 40px;">

    @php
        $currentCity = request()->cookie('city', 'Санкт-Петербург');
        $cities = ['Санкт-Петербург', 'Москва', 'Екатеринбург']; // Добавьте все города здесь
    @endphp

    <ul>
        <li class="menu-item-has-children">
            <a href="#" class="header-head-city-link">
                <svg width="24" height="24"><use xlink:href="#icon-pin"></use></svg>
                <span>{{ $currentCity }}</span>
                <i><svg width="12" height="12">
                        <use xlink:href="#icon-angle-down"></use></svg></i>
            </a>
            <ul class="sub-menu">
                @foreach ($cities as $city)
                    @if ($city !== $currentCity)
                        <li>
                            <form action="/change-city" method="post">
                                @csrf
                                <input type="hidden" name="city" value="{{ $city }}">
                                <a href="#" onclick="this.closest('form').submit(); return false;">{{ $city }}</a>
                            </form>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
    </ul>


    Телефон: <span id="phone">{{ request()->cookie('phone', '812 313 34 4') }}</span>


    <hr>

            <nav>
                <ul>
                    @foreach ($menuPages as $page)
                        <li>
                            @if($page->link)
                                <a href="{{ $page->link }}">{{ $page->title }}</a>
                            @else
                                <a href="{{ url('/page/'.$page->slug) }}">{{ $page->title }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>


    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

<br><br>
            Текст

<br><br>

                @foreach ($latestNews as $news)
                    <div>
                        <h3><a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a></h3>
                        <p>{{ $news->description }}</p>
                        <!-- Дополнительные детали новости -->
                    </div>
                @endforeach



        </div>
</div>
    </body>
</html>
