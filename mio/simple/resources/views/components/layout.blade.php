<!DOCTYPE html>
<html>

<head>
    <title>{{ isset($title) ? $title . ' - simple': 'sin titulo - simple'}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>


    <header>
        header links, menu
        <nav>
            <ul>

            </ul>
        </nav>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        2026
    </footer>

</body>

</html>