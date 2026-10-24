<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tes AI Laravel</title>
    <script src="https://tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-xl font-bold mb-4 text-gray-800">Tanya AI (Gemini Gratis)</h1>

        <div id="box-chat" class="h-48 overflow-y-auto border p-3 rounded mb-4 bg-gray-50 text-sm text-gray-600">
            <!-- Jawaban AI akan muncul di sini -->
            Belum ada percakapan.
        </div>

        <div class="flex gap-2">
            <input type="text" id="input-pesan" placeholder="Ketik pertanyaan..." class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button onclick="kirimKeAi()" id="btn-kirim" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kirim</button>
        </div>
    </div>

    <script>
        async function kirimKeAi() {
            const input = document.getElementById('input-pesan');
            const boxChat = document.getElementById('box-chat');
            const btn = document.getElementById('btn-kirim');

            if(!input.value.trim()) return;

            boxChat.innerText = "Sedang berpikir...";
            btn.disabled = true;

            try {
                // Memanggil route API Laravel yang sudah dibuat sebelumnya
                const response = await fetch('/api/tanya-ai', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ pesan: input.value })
                });

                const data = await response.json();

                if(data.status === 'success') {
                    boxChat.innerHTML = `<strong>AI:</strong> ${data.jawaban.replace(/\n/g, '<br>')}`;
                } else {
                    boxChat.innerText = "Error: " + data.message;
                }
            } catch (error) {
                boxChat.innerText = "Gagal terhubung ke server Laravel.";
            } finally {
                btn.disabled = false;
                input.value = "";
            }
        }
    </script>
</body>
</html>
