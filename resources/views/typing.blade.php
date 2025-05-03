<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Effect</title>
    <style>
        .typing {
            /* border-right: 2px solid purple; /* Cursor effect */
            white-space: nowrap;
            overflow: hidden;
            animation: blink 0.75s step-end infinite;
            padding-right: 1px;  */
        }

        .prefix {
            color: white; /* Warna untuk "I'm" */
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }
    </style>
</head>

<body class="bg-black flex flex-col items-center justify-center h-screen">
    <h1 id="text" class="text-3xl text-left ml-30 -mr-4 mb-4 py-8 text-purple-600 typing"></h1>

    <script>
        const prefix = "And I'm a "; // Prefix yang ingin ditambahkan
        const texts = [
            "Mechanical Engineering",
            "Web Development",
            "Ui/Ux Design"
        ];
        
        let index = 0;
        let charIndex = 0;

        function type() {
            const currentText = texts[index];
            document.getElementById('text').innerHTML = `<span class="prefix">${prefix}</span>${currentText.slice(0, charIndex + 1)}`;
            charIndex++;

            if (charIndex < currentText.length) {
                setTimeout(type, 150); // Speed of typing
            } else {
                setTimeout(deleteText, 2000); // Wait before deleting
            }
        }

        function deleteText() {
            const currentText = texts[index];
            document.getElementById('text').innerHTML = `<span class="prefix">${prefix}</span>${currentText.slice(0, charIndex)}`;
            charIndex--;

            if (charIndex >= 0) {
                setTimeout(deleteText, 100); // Speed of deleting
            } else {
                index = (index + 1) % texts.length; // Move to the next text
                charIndex = 0; // Reset charIndex for the next text
                setTimeout(type, 500); // Wait before starting to type again
            }
        }

        // Start the typing effect
        type();
    </script>

<style>
    /* Menambahkan animasi untuk melambai */
    .waving-icon {
        display: inline-block;
        animation: wave 0.3s infinite alternate;
    }

    /* Definisi animasi wave */
    @keyframes wave {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(20deg);
        }
    }
</style>


</body>
</html>
