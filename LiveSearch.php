<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progress 4 - Live Search Program Kerja FOKRI PTK</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8fafc;
      padding: 20px;
    }
    h1 {
      color: #1e3a8a;
      margin-bottom: 20px;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #cbd5e1;
      border-radius: 4px;
      font-size: 16px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    th, td {
      padding: 12px;
      border: 1px solid #e2e8f0;
      text-align: left;
    }
    th {
      background-color: #1e3a8a;
      color: white;
    }
  </style>
</head>
<body>
  <h1>Live Search Program Kerja</h1>
  <input type="text" id="search" placeholder="Cari judul program kerja...">

  <table>
    <thead>
      <tr>
        <th>Judul Program</th>
        <th>Status</th>
        <th>Progres</th>
      </tr>
    </thead>
    <tbody id="table-body">
    </tbody>
  </table>

  <script>
    const data = [
      { judul: "Kajian Rutin", status: "Berjalan", progres: "50%" },
      { judul: "Pelatihan Kepemimpinan", status: "Perencanaan", progres: "20%" },
      { judul: "Bakti Sosial", status: "Selesai", progres: "100%" },
      { judul: "Rapat Koordinasi", status: "Berjalan", progres: "40%" },
      { judul: "Penggalangan Dana", status: "Perencanaan", progres: "10%" }
    ];

    function renderTable(filteredData) {
      const tbody = document.getElementById("table-body");
      tbody.innerHTML = "";
      filteredData.forEach(item => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${item.judul}</td>
          <td>${item.status}</td>
          <td>${item.progres}</td>
        `;
        tbody.appendChild(row);
      });
    }

    document.getElementById("search").addEventListener("keyup", function() {
      const keyword = this.value.toLowerCase();
      const filtered = data.filter(item => item.judul.toLowerCase().includes(keyword));
      renderTable(filtered);
    });

    // initial render
    renderTable(data);
  </script>
</body>
</html>