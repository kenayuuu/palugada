<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Palugada</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
      overflow-x: hidden;
    }

    /* Navbar Sticky */
    .navbar {
      background: linear-gradient(to right, #6a0dad, #cc66ff);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1040;
    }

    /* Sidebar */
    .sidebar {
      background: linear-gradient(to bottom, #6a0dad, #cc66ff);
      min-height: 100vh;
      color: white;
      padding: 20px 15px;
      width: 230px;
      position: fixed;
      top: 56px;
      left: 0;
      transition: transform 0.3s ease;
      z-index: 1030;
    }

    .sidebar.hidden {
      transform: translateX(-100%);
    }

    .sidebar a {
      color: white;
      display: block;
      padding: 10px 15px;
      border-radius: 6px;
      text-decoration: none;
      margin-bottom: 10px;
      transition: background 0.2s ease;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: rgba(255, 255, 255, 0.2);
    }

    /* Konten Utama */
    .main-content {
      margin-left: 230px;
      padding: 90px 30px 70px 30px; /* Atas: navbar, Bawah: footer */
      transition: margin-left 0.3s ease;
      min-height: 100vh;
    }

    .main-content.expanded {
      margin-left: 0;
    }

    /* Footer Sticky */
    footer {
      background: linear-gradient(to right, #cc66ff, #6a0dad);
      position: fixed;
      bottom: 0;
      width: 100%;
      color: white;
      font-size: 14px;
      text-align: center;
      padding: 12px 0;
      z-index: 1040;
    }

    .logout-btn {
      border: none;
      background: none;
      padding: 0;
      color: white;
      text-decoration: underline;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .sidebar {
        top: 56px;
      }

      .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <button class="btn text-white me-2" id="toggleSidebar">&#9776;</button>
    <a class="navbar-brand text-white fw-bold" href="/">PALUGADA</a>
    <div class="d-flex ms-auto">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" />
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">🏠 Home</a>

  @auth
  <a href="/obat" class="{{ request()->is('obat') ? 'active' : '' }}">💊 Obat</a>
  <a href="/makanan" class="{{ request()->is('makanan') ? 'active' : '' }}">🍔 Makanan</a>
  <a href="/kategori" class="{{ request()->is('kategori') ? 'active' : '' }}">🗂️ Kategori</a>
  <a href="/pakaian" class="{{ request()->is('pakaian') ? 'active' : '' }}">👕 Pakaian</a>
  <div class="mt-4">
    <div class="small">👤 {{ Auth::user()->name }}</div>
    <form action="/logout" method="POST" class="mt-1">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>
  @else
  <a href="{{ route('login') }}">🔐 Login</a>
  @endauth
</div>

<!-- Konten Utama -->
<div class="main-content" id="mainContent">
  <div class="container">
    @yield('content')
  </div>
</div>

<!-- Footer -->
<footer>
  Copyright &copy; 2025 - Manajemen Informatika 2A
</footer>

<!-- Sidebar Toggle Script -->
<script>
  const toggleBtn = document.getElementById('toggleSidebar');
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('mainContent');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('hidden');
    mainContent.classList.toggle('expanded');
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
