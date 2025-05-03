<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    @vite('resources/css/app.css') <!-- Pastikan menggunakan Vite untuk Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-bold text-center mb-6">Tambah Data</h2>

        <form id="dataForm">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label> <!-- Ganti Total menjadi Title -->
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="photo" class="block text-gray-700">Foto</label>
                <input type="file" id="photo" name="photo" class="w-full px-4 py-2 border rounded-md" accept="image/*" required>
            </div>

            <button type="submit" class="w-full bg-purple-500 text-white py-2 rounded-md hover:bg-purple-600">
                Tambah Data
            </button>
        </form>

        <div id="resultSection" class="mt-10">
            <h3 class="text-xl font-semibold">Data yang Dimasukkan:</h3>
            <div id="resultData" class="mt-4"></div>
        </div>
    </div>

    <script>
        document.getElementById('dataForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('name').value;
            const title = document.getElementById('title').value;  <!-- Ganti total menjadi title -->
            const photo = document.getElementById('photo').files[0];

            if (name && title && photo) {  <!-- Ganti total menjadi title -->
                const reader = new FileReader();
                reader.onload = function(event) {
                    const photoUrl = event.target.result;

                    const dataDiv = document.createElement('div');
                    dataDiv.classList.add('flex', 'items-center', 'mb-4');

                    dataDiv.innerHTML = `
                        <img src="${photoUrl}" alt="Foto" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <p class="font-semibold">${name}</p>
                            <p>Title: ${title}</p> <!-- Ganti Total menjadi Title -->
                        </div>
                    `;

                    document.getElementById('resultData').appendChild(dataDiv);
                };

                reader.readAsDataURL(photo);

                // Clear the form after submission
                document.getElementById('dataForm').reset();
            } else {
                alert('Semua kolom harus diisi!');
            }
        });
    </script>
</body>
</html>
