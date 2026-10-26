<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chalise-Mansion | POS System</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f3ef; color: #292722; }
        
        /* --- LAYOUT SIDEBAR --- */
        .admin-layout { display: flex; min-height: 100vh; }
        
        .sidebar { 
            width: 260px; background: #171714; color: #fff; 
            display: flex; flex-direction: column; flex-shrink: 0;
            border-right: 2px solid #b99a5b;
        }
        
        .brand { 
            display: flex; align-items: center; gap: 15px; 
            padding: 30px 25px; border-bottom: 1px solid #333;
        }
        .brand-icon { 
            background: #c9a96e; color: #171714; padding: 12px; 
            border-radius: 8px; font-weight: bold; font-size: 18px;
        }
        .brand h2 { font-size: 20px; letter-spacing: 2px; margin: 0; }
        .brand small { color: #c9a96e; letter-spacing: 4px; font-size: 10px; display: block; margin-top: 3px; }
        
        .menu-label { color: #666; font-size: 11px; font-weight: bold; letter-spacing: 2px; margin: 30px 25px 10px; }
        
        .menu { 
            display: block; text-decoration: none; color: #d7ddd8; 
            padding: 15px 25px; font-size: 14px; transition: 0.2s;
            border-left: 3px solid transparent;
        }
        .menu:hover { background: #242321; color: #e5c58c; }
        .menu.active { 
            background: #242321; color: #e5c58c; 
            border-left: 3px solid #c9a96e; font-weight: bold;
        }
        
        .sidebar-bottom { margin-top: auto; padding: 25px; color: #666; font-size: 12px; line-height: 1.8; border-top: 1px solid #333; }
        
        /* --- MAIN CONTENT --- */
        .main-content { flex: 1; min-width: 0; padding: 40px; overflow-y: auto; }
        
        h1 { font-size: 28px; color: #171714; margin-bottom: 10px; }
        
        /* --- TABEL & KARTU --- */
        .card { background: white; padding: 25px; border-radius: 12px; margin-bottom: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.03); border: 1px solid #eee; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px; border-bottom: 1px solid #eee; text-align: left; font-size: 14px; }
        th { background: #f9f8f6; color: #76664f; font-weight: bold; text-transform: uppercase; font-size: 12px; letter-spacing: 1px; }
        
        input, select, button { width: 100%; padding: 12px; margin: 5px 0 15px; border: 1px solid #ddd; border-radius: 6px; font-family: inherit; }
        button { background: #171714; color: white; cursor: pointer; font-weight: bold; }
        .gold { background: #b99a5b; color: #171714; }
        
        .success { color: #167344; background: #d1fae5; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        .error { color: #b42318; background: #fee2e2; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="admin-layout">
        
        <!-- SIDEBAR KIRI -->
        <aside class="sidebar">
            <div class="brand">
                <span class="brand-icon">CM</span>
                <div>
                    <h2>CHALISE</h2>
                    <small>MANSION</small>
                </div>
            </div>

            <p class="menu-label">MENU UTAMA</p>
            <a href="{{ route('admin.dashboard') }}" class="menu {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">◈ Dashboard</a>
            <a href="{{ route('products.index') }}" class="menu {{ request()->routeIs('products.index') ? 'active' : '' }}">◇ Data Produk</a>
            <a href="{{ route('products.create') }}" class="menu {{ request()->routeIs('products.create') ? 'active' : '' }}">◇ Tambah Produk</a>
            <a href="{{ route('catalog.index') }}" class="menu {{ request()->routeIs('catalog.*') ? 'active' : '' }}">◇ Katalog Sepatu</a>
            <a href="{{ route('sales.create') }}" class="menu {{ request()->routeIs('sales.create') ? 'active' : '' }}">◇ Kasir</a>
            <a href="{{ route('sales.index') }}" class="menu {{ request()->routeIs('sales.index') ? 'active' : '' }}">◇ Riwayat Penjualan</a>

            <div class="sidebar-bottom">
                <p>Step Into Your Elegance</p>
                <small>© 2026 Chalise-Mansion</small>
            </div>
        </aside>

        <!-- KONTEN HALAMAN -->
        <main class="main-content">
            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="error">
                    @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
                </div>
            @endif

            @yield('content')
        </main>
        
    </div>
</body>
</html>