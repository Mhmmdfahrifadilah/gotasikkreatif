<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?>
<?php
session_start();
$login_error = '';
$register_error = '';
$register_success = '';
$show_register = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($email === '' || $password === '') {
        $login_error = 'Email dan kata sandi harus diisi.';
    } else {
        $stmt = $db->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        if ($stmt) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($user = $result->fetch_assoc()) {
                // Detect possible password column names
                $candidates = ['password','pass','pwd','kata_sandi','sandi','passwd','password_hash','pw'];
                $hash = null;
                foreach ($candidates as $cand) {
                    if (array_key_exists($cand, $user)) {
                        $hash = $user[$cand];
                        break;
                    }
                }
                if ($hash === null) {
                    // try case-insensitive match
                    foreach ($user as $k => $v) {
                        $lk = strtolower($k);
                        if (in_array($lk, $candidates, true)) {
                            $hash = $v;
                            break;
                        }
                    }
                }

                if ($hash === null) {
                    $login_error = 'Kolom kata sandi tidak ditemukan di tabel pengguna.';
                } else {
                    $ok = false;
                    if (password_verify($password, $hash)) {
                        $ok = true;
                    } elseif ($password === $hash) {
                        $ok = true; // fallback for unhashed
                    }

                    if ($ok) {
                        // Prefer id/email if present
                        if (isset($user['id'])) $_SESSION['user_id'] = $user['id'];
                        if (isset($user['email'])) $_SESSION['user_email'] = $user['email'];
                        header('Location: kelola.php');
                        exit;
                    } else {
                        $login_error = 'Email atau kata sandi salah.';
                    }
                }
            } else {
                $login_error = 'Email tidak ditemukan.';
            }
            $stmt->close();
        } else {
            $login_error = 'Terjadi kesalahan server (DB).';
        }
    }
}
// Registration handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
    $shop_name = isset($_POST['shop_name']) ? trim($_POST['shop_name']) : '';
    $email_reg = isset($_POST['email_reg']) ? trim($_POST['email_reg']) : '';
    $category = isset($_POST['category']) ? trim($_POST['category']) : '';
    $password_reg = isset($_POST['password_reg']) ? $_POST['password_reg'] : '';
    $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';

    $show_register = true;

    if ($full_name === '' || $email_reg === '' || $password_reg === '') {
        $register_error = 'Nama, email, dan kata sandi wajib diisi.';
    } elseif ($password_reg !== $password_confirm) {
        $register_error = 'Kata sandi dan konfirmasi tidak cocok.';
    } elseif (strlen($password_reg) < 6) {
        $register_error = 'Kata sandi minimal 6 karakter.';
    } else {
        // check email exists
        $s = $db->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        if ($s) {
            $s->bind_param('s', $email_reg);
            $s->execute();
            $res = $s->get_result();
            if ($res && $res->fetch_assoc()) {
                $register_error = 'Email sudah terdaftar.';
            } else {
                $s->close();
                $hash = password_hash($password_reg, PASSWORD_DEFAULT);
                $ins = $db->prepare('INSERT INTO users (full_name, email, password_hash, role, created_at) VALUES (?, ?, ?, ?, NOW())');
                if ($ins) {
                    $role = 'customer';
                    $ins->bind_param('ssss', $full_name, $email_reg, $hash, $role);
                    if ($ins->execute()) {
                        $uid = $ins->insert_id;
                        $_SESSION['user_id'] = $uid;
                        $_SESSION['user_email'] = $email_reg;
                        header('Location: kelola.php');
                        exit;
                    } else {
                        $register_error = 'Gagal menyimpan pengguna: ' . $ins->error;
                    }
                    $ins->close();
                } else {
                    $register_error = 'Terjadi kesalahan saat mempersiapkan query.';
                }
            }
        } else {
            $register_error = 'Terjadi kesalahan server (DB).';
        }
    }
}
?><html class="light" lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>TasikKreatifGo | UMKM Portal</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .active-tab {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .form-input-focus:focus {
            border-color: #000666;
            box-shadow: 0 0 0 2px rgba(0, 6, 102, 0.1);
            outline: none;
        }
        .batik-pattern {
            background-color: #f3faff;
            background-image: url("https://www.transparenttextures.com/patterns/cubes.png"); /* Placeholder for batik-style geometry */
            opacity: 0.05;
        }
    </style>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary": "#ffffff",
                        "surface": "#f3faff",
                        "tertiary": "#191c10",
                        "inverse-on-surface": "#dff4ff",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-fixed": "#3b0900",
                        "primary": "#000666",
                        "secondary-container": "#fe5e2f",
                        "secondary-fixed-dim": "#ffb5a0",
                        "on-tertiary-fixed": "#1a1d11",
                        "surface-dim": "#c7dde9",
                        "on-tertiary": "#ffffff",
                        "on-primary-container": "#8690ee",
                        "on-background": "#071e27",
                        "surface-tint": "#4c56af",
                        "surface-variant": "#cfe6f2",
                        "primary-fixed": "#e0e0ff",
                        "on-primary-fixed": "#000767",
                        "tertiary-fixed": "#e2e4d1",
                        "error-container": "#ffdad6",
                        "on-primary-fixed-variant": "#343d96",
                        "error": "#ba1a1a",
                        "surface-container-high": "#d5ecf8",
                        "surface-container": "#dbf1fe",
                        "on-secondary-fixed-variant": "#872000",
                        "surface-bright": "#f3faff",
                        "background": "#f3faff",
                        "primary-container": "#1a237e",
                        "on-error-container": "#93000a",
                        "secondary-fixed": "#ffdbd1",
                        "on-secondary-container": "#581200",
                        "inverse-primary": "#bdc2ff",
                        "on-tertiary-fixed-variant": "#45483a",
                        "outline-variant": "#c6c5d4",
                        "primary-fixed-dim": "#bdc2ff",
                        "on-error": "#ffffff",
                        "on-primary": "#ffffff",
                        "on-surface": "#071e27",
                        "on-tertiary-container": "#969988",
                        "inverse-surface": "#1e333c",
                        "outline": "#767683",
                        "tertiary-container": "#2e3124",
                        "surface-container-low": "#e6f6ff",
                        "surface-container-highest": "#cfe6f2",
                        "on-surface-variant": "#454652",
                        "secondary": "#b12d00",
                        "tertiary-fixed-dim": "#c6c8b5"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "margin-mobile": "16px",
                        "gutter": "24px",
                        "base": "8px",
                        "margin-desktop": "48px",
                        "container-max": "1200px"
                    },
                    "fontFamily": {
                        "headline-md": ["Manrope"],
                        "headline-lg-mobile": ["Manrope"],
                        "headline-xl": ["Manrope"],
                        "body-lg": ["Work Sans"],
                        "headline-lg": ["Manrope"],
                        "body-md": ["Work Sans"],
                        "label-md": ["Work Sans"],
                        "label-sm": ["Work Sans"]
                    },
                    "fontSize": {
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "headline-lg-mobile": ["28px", {"lineHeight": "36px", "fontWeight": "700"}],
                        "headline-xl": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}]
                    }
                },
            },
        }
    </script>
</head>
<body class="bg-surface text-on-surface font-body-md overflow-x-hidden">
<!-- Auth Layout Split Screen -->
<main class="min-h-screen flex flex-col md:flex-row relative" style="opacity: 1; transition: opacity 0.8s ease-out;">
<!-- Left Side: Visual Narrative -->
<section class="hidden md:flex md:w-1/2 bg-primary relative overflow-hidden items-center justify-center">
<div class="absolute inset-0 z-0">
<div class="w-full h-full" data-alt="A high-quality, authentic photograph of a skilled West Javanese artisan focused on weaving a traditional bamboo mat. The setting is a sun-drenched workshop in Tasikmalaya, filled with natural textures and golden hour lighting that highlights the intricate details of the craft. The image composition uses a shallow depth of field, emphasizing the hands of the artisan. The overall mood is dignified, professional, and deeply rooted in heritage, using warm earth tones and soft shadows." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDu76lIbYCPaJv_wclRBor8mNFahXVdsbd02SB-5XY7U-ZPHW39GX8LDd3-zu1dgYXL95Fq--Ro1jN-EsfVUv2ryBQbTe0sMb_sjklMt4DV28Zi1xx2di2gjvgXLkzBQAMrxtvE0HHyV7us9tVKQ9yaN6TvLRPONhNG66T6zScqxzbQqZSu2fQg-lhHZOwk8Tx9-Ladjm7mUrvkDAKXbY8tgFkO5OYjejMHZLAZ88JSSg4DPKBh8JskTP786IDBsMYVEqkB7En1rRw7')"></div>
<div class="absolute inset-0 bg-primary/40 mix-blend-multiply"></div>
<div class="absolute inset-0 batik-pattern"></div>
</div>
<div class="relative z-10 p-margin-desktop text-on-primary max-w-lg">
<h1 class="font-headline-xl text-headline-xl mb-6 text-white leading-tight">
                    Berdayakan <br><span class="text-secondary-fixed">Kreativitas</span> Lokal.
                </h1>
<p class="font-body-lg text-body-lg text-primary-fixed mb-8 opacity-90">
                    Bergabunglah dengan ekosistem digital UMKM Tasikmalaya. Kelola bisnis Anda dengan mudah dan jangkau pasar yang lebih luas.
                </p>
<div class="flex items-center gap-4">
<div class="w-12 h-1 bg-secondary-container"></div>
<span class="font-label-md text-label-md tracking-widest uppercase">TasikKreatifGo Portal</span>
</div>
</div>
</section>
<!-- Right Side: Interaction UI -->
<section class="w-full md:w-1/2 flex items-center justify-center p-6 md:p-12 lg:p-24 bg-surface min-h-screen">
<div class="w-full max-w-md">
<!-- Branding Mobile Only -->
<div class="md:hidden mb-12 flex justify-center">
<span class="text-headline-md font-headline-md font-extrabold text-primary">TasikKreatifGo</span>
</div>
<!-- Form Card -->
<div class="bg-white rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-8 border border-outline-variant/30">
<!-- Toggle Switch -->
<div class="flex bg-surface-container-low p-1 rounded-full mb-8">
<button class="flex-1 py-2 rounded-full font-label-md text-label-md transition-all duration-300 bg-primary text-white shadow-sm" id="btn-login" onclick="toggleAuth('login')">
                            Login UMKM
                        </button>
<button class="flex-1 py-2 rounded-full font-label-md text-label-md transition-all duration-300 text-on-surface-variant hover:bg-surface-variant/50" id="btn-register" onclick="toggleAuth('register')">
                            Daftar Baru
                        </button>
</div>
<!-- Login Form -->
<?php if (!empty($login_error)): ?>
    <div class="mb-4 p-3 rounded bg-red-50 text-red-800"><?= htmlspecialchars($login_error) ?></div>
<?php endif; ?>
<form class="space-y-6 block" id="form-login" method="post">
    <input type="hidden" name="login" value="1">
<div class="space-y-2">
<label class="font-label-md text-label-md text-on-surface-variant">Email Bisnis</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-body-md">mail</span>
<input name="email" class="w-full pl-10 pr-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="nama@bisnisanda.com" type="email">
</div>
</div>
<div class="space-y-2">
<label class="font-label-md text-label-md text-on-surface-variant">Kata Sandi</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-body-md">lock</span>
<input name="password" class="w-full pl-10 pr-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="••••••••" type="password">
</div>
</div>
<div class="flex justify-end">
<a class="text-label-sm font-label-sm text-primary hover:underline" href="#">Lupa kata sandi?</a>
</div>
<button class="w-full bg-primary text-white font-label-md text-label-md py-4 rounded-lg hover:bg-primary-container transition-all active:scale-[0.98]" type="submit">
                            Masuk ke Dashboard
                        </button>
</form>
<!-- Register Form (Hidden by default) -->
<form class="space-y-5 hidden" id="form-register"><div class="space-y-2"><label class="font-label-md text-label-md text-on-surface-variant">Nama Lengkap</label><input class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Nama sesuai KTP" type="text"></div><div class="space-y-2"><label class="font-label-md text-label-md text-on-surface-variant">Nama UMKM</label><input class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Contoh: Batik Tasik Mandiri" type="text"></div><div class="space-y-2"><label class="font-label-md text-label-md text-on-surface-variant">Email Bisnis</label><input class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="nama@bisnisanda.com" type="email"></div><div class="space-y-2"><label class="font-label-md text-label-md text-on-surface-variant">Kategori Produk</label><select class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all appearance-none"><option>Pilih Kategori</option><option>Batik</option><option>Bordir</option><option>Anyaman</option><option>Kelom Geulis</option><option>Kuliner</option></select></div><div class="grid grid-cols-1 md:grid-cols-2 gap-4"><div class="space-y-2"><label class="font-label-md text-label-md text-on-surface-variant">Kata Sandi</label><input class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="••••••••" type="password"></div><div class="space-y-2"><label class="font-label-md text-label-md text-on-surface-variant">Konfirmasi Sandi</label><input class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="••••••••" type="password"></div></div><div class="flex items-start gap-3 py-2"><input class="mt-1 rounded border-outline-variant text-primary focus:ring-primary" id="terms" type="checkbox"><label class="text-label-sm font-label-sm text-on-surface-variant leading-relaxed" for="terms">Saya menyetujui <a class="text-primary underline" href="#">Syarat &amp; Ketentuan</a> serta kebijakan privasi TasikKreatifGo.</label></div><button class="w-full bg-primary text-white font-label-md text-label-md py-4 rounded-lg hover:bg-primary-container transition-all active:scale-[0.98]" type="submit">Daftar Sekarang</button></form>
</div>

<!-- Server-backed Register Form (will replace client-only markup at runtime) -->
<div id="server-register-wrap">
    <?php if (!empty($register_error)): ?>
        <div class="mb-4 p-3 rounded bg-red-50 text-red-800"><?= htmlspecialchars($register_error) ?></div>
    <?php endif; ?>
    <form class="space-y-5 <?= $show_register ? '' : 'hidden' ?>" id="form-register-server" method="post">
        <input type="hidden" name="register" value="1">
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-on-surface-variant">Nama Lengkap</label>
            <input name="full_name" class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="" type="text">
        </div>
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-on-surface-variant">Nama UMKM</label>
            <input name="shop_name" class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="" type="text">
        </div>
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-on-surface-variant">Email Bisnis</label>
            <input name="email_reg" class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="" type="email">
        </div>
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-on-surface-variant">Kategori Produk</label>
            <select name="category" class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all appearance-none">
                <option value="">Pilih Kategori</option>
                <option>Batik</option>
                <option>Bordir</option>
                <option>Anyaman</option>
                <option>Kelom Geulis</option>
                <option>Kuliner</option>
            </select>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="font-label-md text-label-md text-on-surface-variant">Kata Sandi</label>
                <input name="password_reg" class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="••••••••" type="password">
            </div>
            <div class="space-y-2">
                <label class="font-label-md text-label-md text-on-surface-variant">Konfirmasi Sandi</label>
                <input name="password_confirm" class="w-full px-4 py-3 rounded-lg border-outline-variant bg-surface-bright font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="••••••••" type="password">
            </div>
        </div>
        <div class="flex items-start gap-3 py-2">
            <input name="terms" class="mt-1 rounded border-outline-variant text-primary focus:ring-primary" id="terms-server" type="checkbox">
            <label class="text-label-sm font-label-sm text-on-surface-variant leading-relaxed" for="terms-server">Saya menyetujui <a class="text-primary underline" href="#">Syarat &amp; Ketentuan</a> serta kebijakan privasi TasikKreatifGo.</label>
        </div>
        <button class="w-full bg-primary text-white font-label-md text-label-md py-4 rounded-lg hover:bg-primary-container transition-all active:scale-[0.98]" type="submit">Daftar Sekarang</button>
    </form>
</div>
<script>
    // Replace client-side-only register form with server-backed form so toggleAuth continues to work
    document.addEventListener('DOMContentLoaded', function(){
        var server = document.getElementById('form-register-server');
        if (!server) return;
        var old = document.getElementById('form-register');
        if (old) old.remove();
        server.id = 'form-register';
    });
</script>

<!-- Secondary Actions -->
<div class="mt-12 text-center space-y-4">
<p class="text-label-sm font-label-sm text-on-surface-variant">
                        Kesulitan mendaftar? <a class="text-primary font-bold" href="#">Hubungi Support Kami</a>
</p>
<div class="flex justify-center items-center gap-6 pt-6 border-t border-outline-variant/30">
<a class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">arrow_back</span>
<span class="font-label-md text-label-md">Kembali ke Beranda</span>
</a>
</div>
</div>
</div>
</section>
</main>
<!-- Bottom Navigation Shell (Mobile Only) - Suppressed as per Task Intent (Transactional) -->
<!-- Exclusion Rule applied for Login/Registration flow -->
<script>
        function toggleAuth(mode) {
            const loginForm = document.getElementById('form-login');
            const registerForm = document.getElementById('form-register');
            const btnLogin = document.getElementById('btn-login');
            const btnRegister = document.getElementById('btn-register');

            if (mode === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                
                btnLogin.classList.add('bg-primary', 'text-white', 'shadow-sm');
                btnLogin.classList.remove('text-on-surface-variant', 'hover:bg-surface-variant/50');
                
                btnRegister.classList.remove('bg-primary', 'text-white', 'shadow-sm');
                btnRegister.classList.add('text-on-surface-variant', 'hover:bg-surface-variant/50');
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                
                btnRegister.classList.add('bg-primary', 'text-white', 'shadow-sm');
                btnRegister.classList.remove('text-on-surface-variant', 'hover:bg-surface-variant/50');
                
                btnLogin.classList.remove('bg-primary', 'text-white', 'shadow-sm');
                btnLogin.classList.add('text-on-surface-variant', 'hover:bg-surface-variant/50');
            }
        }

        // Simple animation on load
        document.addEventListener('DOMContentLoaded', () => {
            const mainContent = document.querySelector('main');
            mainContent.style.opacity = '0';
            mainContent.style.transition = 'opacity 0.8s ease-out';
            requestAnimationFrame(() => {
                mainContent.style.opacity = '1';
            });
        });
    </script>


</body></html>