<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Dashboard</title>
</head>
<body>
    <section class="bg-neutral-200 p-2 w-screen h-screen relative">
        <aside class="flex flex-col gap-2 w-64 h-full peer">
            <menu class="flex flex-col gap-2">
                <li>
                    <a href="#" class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-0-square-fill" viewBox="0 0 16 16">
                            <path d="M8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895"/>
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm5.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99"/>
                        </svg>
                        <span>Menu</span>
                    </a>
                </li>
            </menu>
        </aside>

        <main class="bg-white rounded-xl absolute top-2 bottom-2 right-2 left-12 peer-hover:left-64 transition-all duration-300">

        </main>
    </section>
</body>
</html>
