<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Scroll Smooth Example</title>
    <title>Navbar Example</title>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    @vite('resources/css/app.css')


</head>

<body class="bg-black" style=" margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden; /* Ini mencegah overflow horizontal */">

    <nav class=" backdrop-blur-md bg-transparent border-b border-purple-600 shadow sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0">
                        <a href="#" class="text-2xl font-bold text-white">Porto<span
                                class="text-purple-900">Andrian</span></a>
                    </div>
                    <div class="hidden sm:ml-28 sm:flex sm:space-x-9 mt-3">
                        <a href="#" class="text-white hover:text-purple-600 space-x-2 p-2">Home</a>
                        <a href="#about" class="text-white hover:text-purple-600 space-x-2 p-2">About</a>
                        <a href="#skills" class="text-white hover:text-purple-600 space-x-2 p-2">Skills</a>
                        <a href="#projek" class="text-white hover:text-purple-600 space-x-2 p-2">Project</a>
                        <a href="#kontak" class="text-white hover:text-purple-600 space-x-2 p-2">Contact</a>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center">
                    <a href="{{ route('login') }}"
                        class="ml-4 text-white bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-full">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
    </nav>



    <div class="py-44 flex justify-between items-start">
        <!-- Konten Teks -->
        <div class="ml-36">
            <h1 class="text-3xl text-left text-white mb-4">Hello Rek! <span class="waving-icon">👋</span></h1>

            <h1 class="text-3xl text-left text-white mb-4">
                I'M <span class="text-purple-600">ANDRIAN ALFIANI</span>
            </h1>
            <br>
            @include('typing')
        </div>

        <!-- Foto Profil -->
        <div class="group mr-36 transition-transform duration-500">
            <div class="transform group-hover:scale-110">
                <img src="{{ asset('uk.jpg') }}" alt="Foto Profil Andrian"
                    class="w-60 h-60 rounded-full object-cover shadow-lg border-4 border-purple-500">
            </div>
        </div>

    </div>



    <div class="ml-32 -mr-32 mb-32 space-x-4 -mt-44" style="display: flex; align-items: center;">

        <a href="https://www.linkedin.com/in/andrian" target="_blank"
            class="group inline-flex items-center space-x-2 p-2 transition-all duration-300">
            <img src="https://static.vecteezy.com/system/resources/previews/018/930/480/non_2x/linkedin-logo-linkedin-icon-transparent-free-png.png"
                alt="LinkedIn Logo" class="w-16 h-16 transition-transform duration-300 transform group-hover:scale-110">
            <span class="sr-only">LinkedIn</span>
        </a>

        <a href="https://www.linkedin.com/in/andrian" target="_blank"
            class="group inline-flex items-center space-x-2 p-2 transition-all duration-300">
            <img src="../p.png" alt="LinkedIn Logo"
                class="w-12 h-12 transition-transform duration-300 transform group-hover:scale-110">
            <span class="sr-only">Instagram</span>
        </a>


        <a href="https://www.linkedin.com/in/andrian" target="_blank"
            class="group inline-flex items-center space-x-2 p-2 transition-all duration-300">
            <img src="../a.png" alt="LinkedIn Logo"
                class="w-16 h-19 transition-transform duration-300 transform group-hover:scale-110">
            <span class="sr-only">LinkedIn</span>
        </a>



    </div>

    <!-- <div class="">
        <img src="../uk.jpg" alt="" style="margin-left: auto; width: 200px; height: auto;">
    </div> -->
    <br>




    <main class="container mx-auto py-10">
        <section id="about" class="bg-white/30 backdrop-blur-md p-6 rounded-lg shadow-md">
            <h2 class="text-5xl font-semibold text-white mb-4">About<span class="text-purple-900">Me</span></h2>
            <p class="text-gray-700">
            <h1 class="text-2xl">I'M <span class="text-purple-900">ANDRIAN ALFIANI</span></h1>
            <br>
            <!-- Menampilkan deskripsi layanan pertama dengan ukuran teks lebih besar -->
            @if($services->count() > 0)
                <p class="text-gray-100 text-lg"><i>{{ $services->first()->description }}</i></p>
                <!-- Menggunakan text-lg untuk memperbesar teks -->
            @else
                <p class="text-gray-100 text-lg">No services available.</p> <!-- Menggunakan text-lg untuk memperbesar teks -->
            @endif
            </p>
        </section>
    </main>



    <br>
    <br>
    <div class="container mx-auto px-4 py-14">
        <section id="skills">
            <h1 class="text-5xl text-center text-white font-semibold mb-6">My<span class="text-purple-900">Skills</span>
            </h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($skills as $skill)
                    <div
                        class="bg-gradient-to-r from-purple-500 to-purple-700 p-6 rounded-lg shadow-lg transition-transform transform hover:-translate-y-1">

                        <!-- Gambar -->
                        @if($skill->photo)
                            <img src="{{ asset('storage/' . $skill->photo) }}" alt="{{ $skill->name }}"
                                class="h-16 w-16 rounded-full object-cover mb-4">
                        @endif

                        <!-- Nama Skill -->
                        <h2 class="text-xl font-semibold text-white">{{ $skill->name }}</h2>

                        <!-- Deskripsi -->
                        <ul class="text-white text-sm mt-1 ml-0 pl-0">
                            @foreach(explode("\n", $skill->description) as $item)
                                <li class="m-0 p-0">{{ $loop->iteration }}. {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </section>



        <div class="container mx-auto px-6 py-40">
            //projek PORTOFOLIO
            <section id="projek" <h1 class="text-5xl text-center text-white font-semibold  mb-6">Laters<span
                    class="text-purple-900">Project</span></h1>
            </section>

            <div class="grid grid-cols-3 gap-2 p-8">

                @foreach ($portofolios as $portofolio)
                    <!-- Kolom dengan Gambar -->
                    <div class="group relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
                        <!-- Gambar -->
                        <img src="{{ $portofolio->photo ? asset('storage/' . $portofolio->photo) : asset('images/default.png') }}"
                            alt="{{ $portofolio->name }}"
                            class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">

                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-50 transition-opacity duration-500">
                        </div>

                        <!-- Tulisan dengan Animasi -->
                        <div
                            class="absolute inset-0 flex items-center justify-center opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                            <p class="text-white text-lg font-semibold">{{ $portofolio->name }}</p>
                        </div>
                    </div>
                @endforeach



                <div class="group relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
                    <img src="../c.png" alt="Contoh Gambar"
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-50 transition-opacity duration-500">
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
                    <img src="../h.png" alt="Contoh Gambar"
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-50 transition-opacity duration-500">
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
                    <img src="../o.png" alt="Contoh Gambar"
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-50 transition-opacity duration-500">
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
                    <img src="../1.png" alt="Contoh Gambar"
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-50 transition-opacity duration-500">
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
                    <img src="../2.png" alt="Contoh Gambar"
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-50 transition-opacity duration-500">
                    </div>
                </div>

            </div>

            <div class="container mx-auto px-6 pt-40 pb-2">
                <section id="kontak">
                    <h1 class="text-5xl text-white font-semibold mb-6">
                        Contact<span class="text-purple-900">Me</span>
                    </h1>
                </section>

                <!-- Kontainer untuk teks dan form -->
                <div class="flex flex-col md:flex-row justify-between items-start space-y-8 md:space-y-0 md:space-x-12">
                    <!-- Teks -->
                    <div class="md:w-1/2">
                        <p class="text-white text-3xl mb-4">Friendly & Welcoming</p>
                        <p class="text-white text-1xl leading-relaxed">
                            Let’s Connect! Whether you have a question, an idea, or just want to say hello, don’t
                            hesitate
                            to drop
                            me a message. I’d love to chat with you and explore new opportunities!
                        </p>
                    </div>

                    <!-- Form -->
                    <form action="" method="POST" class="w-full md:w-1/2 space-y-6">
                        <div>
                            <label for="message"
                                class="block text-sm font-medium mb-2 text-white text-3xl">Message</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full bg-white/30 backdrop-blur-md p-6 rounded-lg shadow-md text-gray-800 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                placeholder="Type your message here..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-purple-600 hover:bg-purple-500 transition-colors px-4 py-2 rounded-md text-white font-medium">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>


        </div>




        <footer
            style="background-color: #1a1a1a; color: #fff; padding: 20px; text-align: center; font-family: Arial, sans-serif;">
            <p>&copy; 2024 Andrian. All Rights Reserved.</p>
            <!-- <div style="ml-36 -mr-4 mb-4">
        <a href="https://www.linkedin.com/in/andrian" target="_blank"
            style="color: #fff; text-decoration: none; margin: 0 10px;">
            <i class="fab fa-linkedin"></i> LinkedIn
        </a> |
        <a href="https://github.com/andrian" target="_blank"
            style="color: #fff; text-decoration: none; margin: 0 10px;">
            <i class="fab fa-github"></i> GitHub
        </a> |
        <a href="mailto:andrian@email.com" style="color: #fff; text-decoration: none; margin: 0 10px;">
            <i class="fas fa-envelope"></i> Email
        </a>
    </div> -->

            <!-- <p style="font-size: 12px;">Built with 💻 & ❤️ by Andrian</p> -->
        </footer>


</html>