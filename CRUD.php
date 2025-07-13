<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Program Kerja - FOKRI PTK</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 0;
        }

        .header {
            background: #1e3a8a;
            color: white;
            padding: 15px 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header span {
            font-size: 16px;
        }

        .container {
            padding: 20px;
        }

        h1 {
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #e2e8f0;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #1e3a8a;
            color: white;
        }

        input,
        select,
        textarea {
            padding: 8px;
            margin: 10px 0;
            width: 100%;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            background: #1e3a8a;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #0b6cb3;
        }

        .edit-button {
            background: #f39c12;
        }

        .edit-button:hover {
            background: #e67e22;
        }

        .delete-button {
            background: #e74c3c;
        }

        .delete-button:hover {
            background: #c0392b;
        }

        .form-section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .form-section h2 {
            color: #1e3a8a;
            margin-bottom: 15px;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            display: none;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
        }

        .modal-content h3 {
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        .modal-content button {
            width: auto;
            margin-top: 15px;
        }

        .modal-content button.cancel-button {
            background: #ccc;
            color: #333;
        }

        .modal-content button.cancel-button:hover {
            background: #bbb;
        }

        .back-button {
            background: #555;
            margin-left: auto;
        }

        /* Added for back button style */
        .back-button:hover {
            background: #333;
        }

        @media (max-width: 768px) {

            th,
            td {
                padding: 8px;
                font-size: 14px;
            }

            button {
                padding: 8px 12px;
                font-size: 14px;
            }

            .header,
            .container {
                padding: 10px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <span>CRUD Program Kerja <span id="divisi-title"></span></span>
        <button class="back-button" onclick="kembaliProker()">Kembali ke Program Kerja</button>
    </div>

    <div class="container">
        <h1>Manajemen Program Kerja</h1>

        <div class="form-section">
            <h2>Tambah/Edit Program Kerja</h2>
            <form id="programKerjaForm">
                <input type="hidden" id="programId">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" required>

                <label for="status">Status:</label>
                <select id="status" required>
                    <option value="">Pilih Status</option>
                    <option value="Perencanaan">Perencanaan</option>
                    <option value="Berjalan">Berjalan</option>
                    <option value="Selesai">Selesai</option>
                </select>

                <label for="progres">Progres (%):</label>
                <input type="number" id="progres" min="0" max="100" value="0" required>

                <label for="tempat">Tempat:</label>
                <input type="text" id="tempat">

                <label for="tanggal">Tanggal Pelaksanaan:</label>
                <input type="date" id="tanggal">

                <label for="detail">Detail:</label>
                <textarea id="detail" rows="5"></textarea>

                <button type="submit">Simpan Program Kerja</button>
                <button type="button" onclick="resetForm()" style="background:#f1c40f;">Batal/Reset</button>
            </form>
        </div>

        <h2>Daftar Program Kerja</h2>
        <table id="programKerjaTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Progres</th>
                    <th>Tempat</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" style="text-align:center;">Memuat data...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const divisi = urlParams.get('divisi');
        // UBAH INI: Sesuaikan dengan URL PHP API Anda
        const API_URL = 'http://localhost/fokri/api_program_kerja.php';
        let programKerjaData = [];
        let currentEditId = null; // Menyimpan ID program yang sedang diedit

        document.addEventListener('DOMContentLoaded', () => {
            if (divisi) {
                document.getElementById('divisi-title').textContent = `${divisi}`;
                loadData();
            } else {
                alert("Parameter divisi tidak ditemukan di URL. Tidak bisa memuat data.");
                document.getElementById('programKerjaTable').querySelector('tbody').innerHTML = '<tr><td colspan="7" style="text-align:center; color:red;">Parameter divisi tidak ditemukan.</td></tr>';
            }

            document.getElementById('programKerjaForm').addEventListener('submit', handleFormSubmit);
        });

        async function loadData() {
            const tbody = document.getElementById('programKerjaTable').querySelector('tbody');
            tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;">Memuat data...</td></tr>';

            try {
                const response = await fetch(`${API_URL}?divisi=${encodeURIComponent(divisi)}`);

                // Validasi response
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();

                console.log('API Response:', data); // Debugging

                // Validasi struktur data
                if (!data || !data.success || !Array.isArray(data.programKerja)) {
                    throw new Error('Format response API tidak valid');
                }

                programKerjaData = data.programKerja; // Ambil array dari property programKerja
                renderTable();

            } catch (error) {
                console.error('Error loading data:', error);
                tbody.innerHTML = `<tr><td colspan="7" style="text-align:center; color:red;">
            Gagal memuat data: ${error.message}<br>
            <small>Periksa console untuk detail error</small>
        </td></tr>`;
            }
        }

        function renderTable() {
            const tbody = document.getElementById('programKerjaTable').querySelector('tbody');

            // Pastikan programKerjaData adalah array
            if (!Array.isArray(programKerjaData)) {
                tbody.innerHTML = '<tr><td colspan="7" style="text-align:center; color:red;">Data tidak valid</td></tr>';
                return;
            }

            if (programKerjaData.length === 0) {
                tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;">Belum ada program kerja untuk divisi ini.</td></tr>';
                return;
            }

            tbody.innerHTML = ''; // Kosongkan tabel

            programKerjaData.forEach(item => {
                const row = tbody.insertRow();
                row.insertCell().textContent = item.id || '-';
                row.insertCell().textContent = item.judul || '-';
                row.insertCell().textContent = item.status || '-';
                row.insertCell().textContent = (item.progres || '0') + '%';
                row.insertCell().textContent = item.tempat || '-';
                row.insertCell().textContent = item.tanggal || '-';

                const actionsCell = row.insertCell();
                actionsCell.innerHTML = `
            <button class="edit-button" onclick="editItem(${item.id})">Edit</button>
            <button class="delete-button" onclick="deleteItem(${item.id})">Hapus</button>
        `;
            });
        }

        // async function loadData() {
        //     const tbody = document.getElementById('programKerjaTable').querySelector('tbody');
        //     tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;">Memuat data...</td></tr>';
        //     try {
        //         // Tambahkan parameter divisi ke URL GET request
        //         const response = await fetch(`${API_URL}?divisi=${encodeURIComponent(divisi)}&action=getAllPrograms`); 
        //         const data = await response.json();

        //         if (response.ok && !data.error) {
        //             programKerjaData = data; // Asumsi data sudah difilter oleh API
        //             renderTable();
        //         } else {
        //             throw new Error(data.error || 'Gagal memuat data dari API.');
        //         }
        //     } catch (error) {
        //         console.error('Error loading data:', error);
        //         tbody.innerHTML = `<tr><td colspan="7" style="text-align:center; color:red;">Gagal memuat data: ${error.message}</td></tr>`;
        //     }
        // }

        // function renderTable() {
        //     const tbody = document.getElementById('programKerjaTable').querySelector('tbody');
        //     tbody.innerHTML = ''; // Kosongkan tabel
        //     if (programKerjaData.length === 0) {
        //         tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;">Belum ada program kerja untuk divisi ini.</td></tr>';
        //         return;
        //     }
        //     programKerjaData.forEach(item => {
        //         const row = tbody.insertRow();
        //         row.insertCell().textContent = item.id;
        //         row.insertCell().textContent = item.judul;
        //         row.insertCell().textContent = item.status;
        //         row.insertCell().textContent = item.progres + '%';
        //         row.insertCell().textContent = item.tempat || '-';
        //         row.insertCell().textContent = item.tanggal || '-'; // Format tanggal jika diperlukan
        //         const actionsCell = row.insertCell();
        //         actionsCell.innerHTML = `
        //             <button class="edit-button" onclick="editItem(${item.id})">Edit</button>
        //             <button class="delete-button" onclick="deleteItem(${item.id})">Hapus</button>
        //         `;
        //     });
        // }

        function resetForm() {
            document.getElementById('programId').value = '';
            document.getElementById('judul').value = '';
            document.getElementById('status').value = '';
            document.getElementById('progres').value = '0';
            document.getElementById('tempat').value = '';
            document.getElementById('tanggal').value = '';
            document.getElementById('detail').value = '';
            currentEditId = null;
        }

        async function handleFormSubmit(event) {
            event.preventDefault();
            const programId = document.getElementById('programId').value;
            const judul = document.getElementById('judul').value;
            const status = document.getElementById('status').value;
            const progres = document.getElementById('progres').value;
            const tempat = document.getElementById('tempat').value;
            const tanggal = document.getElementById('tanggal').value;
            const detail = document.getElementById('detail').value;

            const data = {
                divisi: divisi,
                judul: judul,
                status: status,
                progres: parseInt(progres),
                tempat: tempat,
                tanggal: tanggal,
                detail: detail
            };

            if (programId) {
                await updateItem(programId, data);
            } else {
                await createItem(data);
            }
            resetForm();
        }

        async function createItem(data) {
            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                const result = await response.json();
                if (result.success) {
                    alert('Program kerja berhasil ditambahkan!');
                    // Asumsi API mengembalikan item yang baru dengan ID
                    // loadData(); // Reload seluruh data (kurang efisien untuk banyak data)
                    // Lebih baik: tambahkan item ke array lokal dan render ulang
                    data.id = result.id; // Asumsi 'id' dikembalikan dari API
                    programKerjaData.push(data);
                    renderTable();
                } else {
                    alert('Gagal menambahkan program kerja: ' + result.message);
                }
            } catch (error) {
                console.error('Error creating program kerja:', error);
                alert('Terjadi kesalahan jaringan saat menambahkan program kerja.');
            }
        }

        function editItem(id) {
            const item = programKerjaData.find(p => p.id === id);
            if (item) {
                document.getElementById('programId').value = item.id;
                document.getElementById('judul').value = item.judul;
                document.getElementById('status').value = item.status;
                document.getElementById('progres').value = item.progres;
                document.getElementById('tempat').value = item.tempat;
                document.getElementById('tanggal').value = item.tanggal;
                document.getElementById('detail').value = item.detail;
                currentEditId = item.id;
            }
        }

        async function updateItem(id, data) {
            try {
                const response = await fetch(`${API_URL}?id=${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                const result = await response.json();
                if (result.success) {
                    alert('Program kerja berhasil diperbarui!');
                    // Perbarui item di array lokal dan render ulang tabel
                    const index = programKerjaData.findIndex(item => item.id === id);
                    if (index !== -1) {
                        programKerjaData[index] = {
                            ...programKerjaData[index],
                            ...data,
                            id: id
                        }; // Pastikan ID tetap
                    }
                    renderTable();
                } else {
                    alert('Gagal memperbarui program kerja: ' + result.message); // Menampilkan pesan error dari API jika gagal
                }
            } catch (error) {
                console.error('Error updating program kerja:', error);
                alert('Terjadi kesalahan jaringan saat memperbarui program kerja.');
                loadData(); // Muat ulang data untuk sinkronisasi jika ada error jaringan
            }
        }

        // Fungsi untuk menghapus item
        async function deleteItem(id) {
            if (!confirm("Yakin ingin menghapus program kerja ini?")) {
                return;
            }
            try {
                const response = await fetch(`${API_URL}?id=${id}`, { // Menggunakan parameter id di URL untuk DELETE
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        divisi: divisi
                    }) // Mengirim divisi dalam body DELETE
                });
                const result = await response.json();
                if (result.success) {
                    alert('Program kerja berhasil dihapus!');
                    programKerjaData = programKerjaData.filter(item => item.id !== id);
                    renderTable();
                } else {
                    alert('Gagal menghapus program kerja: ' + result.message);
                }
            } catch (error) {
                console.error('Error deleting program kerja:', error);
                alert('Terjadi kesalahan jaringan saat menghapus program kerja.');
            }
        }

        function kembaliProker() {
            window.location.href = `Proker.php?divisi=${encodeURIComponent(divisi)}`;
        }
    </script>
</body>

</html>