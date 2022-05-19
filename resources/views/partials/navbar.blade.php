<nav class="navbar bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard TK-4 IT_BSC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5> -->
            <!-- account setting -->
            @auth
            <div class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->username }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                <li><a class="dropdown-item" href="#">Account Setting</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/pengguna/logout">Logout</a></li>
                </ul>
            </div>
            @endauth
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="/">Halaman Utama</a>
            </li>
            <!-- dimensi -->
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Dimensi") ? 'active' : '' }}" aria-current="page" href="/dimensi">Dimensi</a>
            </li>
            <!-- end of dimensi -->
            <!-- pertanyaan -->
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Pertanyaan") ? 'active' : '' }}" aria-current="page" href="/kuesioner">Pertanyaan</a>
            </li>
            <!-- end of pertanyaan -->
            <!-- pengguna -->
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Pengguna") ? 'active' : '' }}" aria-current="page" href="/pengguna">Pengguna</a>
            </li>
            <!-- end of pengguna -->
            <!-- jawab kuesioner -->
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Kuesioner") ? 'active' : '' }}" aria-current="page" href="/jawaban">Jawab Kuesioner</a>
            </li>
            <!-- end of jawab kuesioner -->
            </ul>
        </div>
        </div>
    </div>
    </nav>