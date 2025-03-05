<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>URL Shortener</title>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        };
    </script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



</head>

<body class="content-center block h-screen">

    <div id="particles-js" class="w-full h-full absolute bg-white dark:bg-gray-800 bg-no-repeat bg-cover -z-1 top-0"></div>

    <main class="container mx-auto p-4">
        <section class="p-10 backdrop-blur-sm border border-gray-300 rounded-xl">
            <div class="form grid grid-cols-1 gap-4 mb-10 lg:grid-cols-3 z-10">
                <div class="hidden lg:block"></div>
                <div>
                    <h1 class="text-4xl text-center text-gray-800 mb-4 flex justify-center items-center gap-4 dark:text-gray-300">
                        URL Shortener
                        <svg class="w-10 fill-gray-800" viewBox="0 0 400 400" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M200 0C89.5433 0 0 89.5433 0 200C0 310.457 89.5433 400 200 400C310.457 400 400 310.457 400 200C400 89.5425 310.457 0 200 0ZM313.163 266.667C316.738 249.811 318.994 231.92 319.728 213.333H372.831C371.441 231.748 367.154 249.631 360.048 266.667H313.163ZM86.8375 133.333C83.2625 150.189 81.0058 168.08 80.2717 186.667H27.17C28.56 168.253 32.8458 150.369 39.9525 133.333H86.8375ZM285.848 133.333C289.854 150.401 292.264 168.273 293.048 186.667H213.333V133.333H285.848ZM213.333 106.667V28.6092C219.413 30.3783 225.435 33.3467 231.345 37.5133C242.421 45.3217 253.017 57.35 261.987 72.2992C268.187 82.6333 273.55 94.1392 278.027 106.668L213.333 106.667ZM138.013 72.2983C146.983 57.3492 157.578 45.32 168.655 37.5125C174.564 33.3458 180.588 30.3775 186.667 28.6083V106.667H121.973C126.451 94.1392 131.813 82.6333 138.013 72.2983ZM186.667 133.333V186.667H106.953C107.736 168.273 110.147 150.401 114.152 133.333H186.667ZM39.9533 266.667C32.8467 249.631 28.5608 231.748 27.1708 213.333H80.2725C81.0067 231.92 83.2633 249.811 86.8383 266.667H39.9533ZM106.953 213.333H186.667V266.667H114.152C110.147 249.6 107.736 231.727 106.953 213.333ZM186.667 293.333V371.392C180.588 369.622 174.565 366.653 168.655 362.487C157.578 354.679 146.983 342.65 138.013 327.702C131.813 317.367 126.451 305.861 121.973 293.333H186.667ZM261.987 327.702C253.017 342.65 242.421 354.679 231.345 362.487C225.435 366.653 219.413 369.622 213.333 371.392V293.333H278.028C273.55 305.861 268.187 317.367 261.987 327.702ZM213.333 266.667V213.333H293.048C292.264 231.727 289.853 249.6 285.848 266.667H213.333ZM319.728 186.667C318.994 168.08 316.738 150.189 313.163 133.333H360.048C367.154 150.369 371.441 168.253 372.831 186.667H319.728ZM346.108 106.667H306.149C298.383 82.1825 287.659 60.7108 274.768 43.5717C292.491 52.0467 308.542 63.4117 322.565 77.435C331.515 86.3842 339.383 96.1592 346.108 106.667ZM77.435 77.435C91.4592 63.4108 107.51 52.0467 125.233 43.5717C112.34 60.7108 101.617 82.1825 93.8508 106.667H53.8933C60.6175 96.1592 68.4858 86.3842 77.435 77.435ZM53.8933 293.333H93.8508C101.617 317.818 112.341 339.289 125.233 356.429C107.51 347.954 91.4592 336.589 77.4358 322.565C68.4858 313.616 60.6175 303.841 53.8933 293.333ZM322.565 322.565C308.542 336.589 292.49 347.954 274.768 356.429C287.66 339.29 298.383 317.818 306.149 293.333H346.108C339.383 303.841 331.515 313.616 322.565 322.565Z"/>
                        </svg>
    
                    </h1>
                    <x-form />
                </div>
                <div class="hidden lg:block"></div>
            </div>
    
            <x-result></x-result>
    
    
            <div class="theme z-10">
                <button id="theme-toggle" type="button" class="text-gray-800 dark:text-gray-300 hover:text-gray-400 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                        </path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd">
                        </path>
                    </svg>
                </button>
            </div>
        </section>

    </main>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
