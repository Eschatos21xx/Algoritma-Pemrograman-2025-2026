<!DOCTYPE html>
<html lang="en" data-bs-theme="light"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        /* Transisi halus saat pindah mode */
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .card {
            transition: transform 0.2s ease;
        }
    </style>
</head>
<body class="bg-body-tertiary"> <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Admin Dashboard</span>
        
        <div class="d-flex align-items-center">
            <button class="btn btn-outline-light btn-sm me-3" id="btnThemeToggle">
                <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
            </button>
            
            <a href="/" class="btn btn-outline-light btn-sm">View Website</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Profil</h5>
                </div>

                <div class="card-body">
                    <p class="text-secondary mb-4"> Page untuk memperbarui informasi profil
                        yang akan ditampilkan di halaman utama website.
                    </p>

                    @if(session('success'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: @json(session('success')),
                                    confirmButtonText: 'OK',
                                    background: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#2b3035' : '#fff',
                                    color: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#fff' : '#000'
                                });
                            });
                        </script>
                    @endif

                    <form action="/admin/update" method="POST" enctype="multipart/form-data" id="profileForm">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $profile->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Bio</label>
                            <textarea name="bio" rows="4" class="form-control">{{ $profile->bio }}</textarea>
                            @error('bio')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Skills (pisahkan dengan koma)</label>
                            <input type="text" name="skills" class="form-control" value="{{ $profile->skills }}">
                            @error('skills')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Foto Profil</label>

                            @if($profile->photo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$profile->photo) }}"
                                         id="previewPhoto"
                                         class="rounded shadow-sm border"
                                         style="width:120px;height:120px;object-fit:cover;">
                                </div>
                            @else
                                <img id="previewPhoto"
                                     class="rounded shadow-sm border d-none"
                                     style="width:120px;height:120px;object-fit:cover;">
                            @endif

                            <input type="file" name="photo" class="form-control mt-2" id="photoInput">

                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="button" class="btn btn-success w-100 py-2" id="btnSave">
                            <i class="bi bi-floppy-fill me-2"></i> Simpan Perubahan
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // --- LOGIC DARK MODE ---
    const btnThemeToggle = document.getElementById('btnThemeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const htmlElement = document.documentElement;

    // Cek penyimpanan lokal (localStorage) saat halaman dimuat
    const savedTheme = localStorage.getItem('theme') || 'light';
    htmlElement.setAttribute('data-bs-theme', savedTheme);
    updateIcon(savedTheme);

    btnThemeToggle.addEventListener('click', () => {
        const currentTheme = htmlElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        htmlElement.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateIcon(newTheme);
    });

    function updateIcon(theme) {
        if (theme === 'dark') {
            themeIcon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill');
        } else {
            themeIcon.classList.replace('bi-sun-fill', 'bi-moon-stars-fill');
        }
    }

    // --- LOGIC PREVIEW FOTO ---
    document.getElementById('photoInput')?.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.getElementById('previewPhoto');
            img.src = e.target.result;
            img.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    });

    // --- LOGIC SWEETALERT ---
    document.getElementById('btnSave')?.addEventListener('click', function () {
        const isDark = htmlElement.getAttribute('data-bs-theme') === 'dark';
        
        Swal.fire({
            title: 'Simpan perubahan?',
            text: 'Data profil akan diperbarui.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Batal',
            // Penyesuaian warna SweetAlert dengan Dark Mode
            background: isDark ? '#2b3035' : '#fff',
            color: isDark ? '#fff' : '#000',
            confirmButtonColor: '#198754'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('profileForm').submit();
            }
        });
    });
</script>

</body>
</html>