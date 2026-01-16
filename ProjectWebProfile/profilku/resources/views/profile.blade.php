<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        html {
            scroll-behavior: smooth;
        }
        /* Transisi halus saat perpindahan tema */
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .nav-link {
            transition: all 0.2s ease;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">MyProfile</a>

        <button class="btn btn-outline-light btn-sm" id="btnThemeToggle">
            <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
            <span id="themeText" class="ms-1">Dark Mode</span>
        </button>
    </div>
</nav>

<section class="bg-body-tertiary py-5 shadow-sm">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-4 text-center mb-4 mb-md-0">
                @if($profile->photo)
                    <img src="{{ asset('storage/'.$profile->photo) }}"
                         class="rounded-circle shadow border border-5 border-white"
                         style="width:180px;height:180px;object-fit:cover;">
                @endif
            </div>

            <div class="col-md-8">
                <h1 class="fw-bold display-5">{{ $profile->name }}</h1>
                <p class="text-secondary fs-5 mb-2">Web Developer</p>

                <p class="lead">
                    {{ $profile->bio ?? 'Bio belum ditambahkan.' }}
                </p>
            </div>

        </div>
    </div>
</section>


<section id="profile-tabs" class="py-5">
    <div class="container">

        <ul class="nav nav-pills mb-4" id="profileTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active me-2"
                        data-bs-toggle="tab"
                        data-bs-target="#about">
                    About Me
                </button>
            </li>

            <li class="nav-item">
                <button class="nav-link"
                        data-bs-toggle="tab"
                        data-bs-target="#skills">
                    Skills
                </button>
            </li>
        </ul>

        <div class="tab-content card p-4 shadow-sm">
            <div class="tab-pane fade show active" id="about">
                <h3 class="mb-3">About Me</h3>
                <p>{{ $profile->bio }}</p>
            </div>

            <div class="tab-pane fade" id="skills">
                <h3 class="mb-3">Skills</h3>

                @if($profile->skills)
                    <div class="d-flex flex-wrap gap-2">
                    @foreach(explode(',', $profile->skills) as $skill)
                        <span class="badge bg-primary px-3 py-2">
                            {{ trim($skill) }}
                        </span>
                    @endforeach
                    </div>
                @else
                    <p class="text-secondary">Skill belum ditambahkan.</p>
                @endif
            </div>
        </div>
    </div>
</section>


<footer class="bg-dark text-white mt-5">
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 mb-3">
                <h5 class="fw-bold">{{ $profile->name }}</h5>
                <p class="text-secondary-emphasis">
                    Website personal menggunakan Laravel 11 dan Bootstrap
                    sebagai bagian dari tugas proyek akademik.
                </p>
            </div>

            <div class="col-md-3 mb-3">
                <h6>Navigation</h6>
                <ul class="list-unstyled">
                    <li><a href="#profile-tabs" class="text-secondary text-decoration-none">About</a></li>
                    <li><a href="#profile-tabs" class="text-secondary text-decoration-none">Skills</a></li>
                    <li><a href="/admin" class="text-secondary text-decoration-none">Admin Panel</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-3">
                <h6>Contact</h6>
                <ul class="list-unstyled">
                    <li class="text-secondary">Email: email@email.com</li>
                    <li class="text-secondary">Location: Indonesia</li>
                </ul>
            </div>

        </div>

        <hr class="border-secondary">

        <div class="text-center">
            <small class="text-secondary">© {{ date('Y') }} {{ $profile->name }}. All rights reserved.</small>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // --- LOGIC DARK MODE (Identik dengan Admin Panel) ---
    const btnThemeToggle = document.getElementById('btnThemeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const themeText = document.getElementById('themeText');
    const htmlElement = document.documentElement;

    // Load preferensi dari localStorage
    const savedTheme = localStorage.getItem('theme') || 'light';
    applyTheme(savedTheme);

    btnThemeToggle.addEventListener('click', () => {
        const currentTheme = htmlElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        applyTheme(newTheme);
    });

    function applyTheme(theme) {
        htmlElement.setAttribute('data-bs-theme', theme);
        localStorage.setItem('theme', theme);
        
        if (theme === 'dark') {
            themeIcon.className = 'bi bi-sun-fill';
            themeText.textContent = 'Light Mode';
        } else {
            themeIcon.className = 'bi bi-moon-stars-fill';
            themeText.textContent = 'Dark Mode';
        }
    }
</script>

</body>
</html>