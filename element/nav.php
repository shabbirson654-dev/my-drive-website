<nav class="navbar navbar-expand-lg navbar-dark sticky-top modern-navbar">

    <div class="container-fluid nav-container">

        <a href="" class="navbar-brand drive-brand">
            <span class="brand-icon">D</span>
            <span class="brand-text">My Drive Website</span>
        </a>

        <button
            class="navbar-toggler modern-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarsupportedcontent"
            aria-controls="navbarsupportedcontent"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div
            class="collapse navbar-collapse"
            id="navbarsupportedcontent">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a href="#" class="nav-link modern-link active">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link modern-link">
                        Link
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link modern-link">
                        About Us
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link modern-link">
                        Contact Us
                    </a>
                </li>

                <li class="nav-item login-item">
                    <a href="login.php" class="login-button">
                        <span>Login</span>
                        <span class="login-arrow">→</span>
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>

<style>

.modern-navbar {
    height: 78px;
    background: rgba(6, 7, 25, 0.72);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border-bottom: 1px solid rgba(255,255,255,.07);
    transition: all .3s ease;
    z-index: 9999;
}

.nav-container {
    height: 100%;
    padding-left: 28px;
    padding-right: 28px;
}

.drive-brand {
    display: flex !important;
    align-items: center;
    gap: 11px;
    text-decoration: none;
    margin-left: 5px;
}

.brand-icon {
    width: 39px;
    height: 39px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: linear-gradient(135deg, #7164ef, #4788ff);
    color: white;
    font-size: 18px;
    font-weight: 800;
    box-shadow: 0 7px 20px rgba(94,84,230,.35);
}

.brand-text {
    font-size: 18px;
    font-weight: 700;
    letter-spacing: -.3px;
    color: #ffffff;
    white-space: nowrap;
}

.modern-link {
    position: relative;
    color: #aeb0c3 !important;
    font-size: 14px;
    font-weight: 500;
    padding: 10px 16px !important;
    margin: 0 2px;
    transition: all .25s ease;
}

.modern-link:hover {
    color: #ffffff !important;
}

.modern-link.active {
    color: #ffffff !important;
}

.modern-link.active::after {
    content: "";
    position: absolute;
    left: 16px;
    right: 16px;
    bottom: 3px;
    height: 2px;
    border-radius: 20px;
    background: linear-gradient(90deg, #7164ef, #55bfff);
}

.login-item {
    margin-left: 14px;
}

.login-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-width: 105px;
    height: 43px;
    padding: 0 16px;
    border-radius: 12px;
    text-decoration: none;
    color: #ffffff !important;
    font-size: 14px;
    font-weight: 600;
    background: linear-gradient(135deg, #7164ef, #477ff5);
    box-shadow: 0 8px 22px rgba(75,88,220,.25);
    transition: all .25s ease;
}

.login-button:hover {
    transform: translateY(-2px);
    color: #ffffff !important;
    box-shadow: 0 12px 28px rgba(75,88,220,.38);
}

.login-arrow {
    font-size: 17px;
    transition: transform .25s ease;
}

.login-button:hover .login-arrow {
    transform: translateX(3px);
}

.modern-toggler {
    border: 1px solid rgba(255,255,255,.15) !important;
    border-radius: 10px;
    padding: 7px 9px;
    box-shadow: none !important;
}

.modern-toggler:focus {
    box-shadow: 0 0 0 3px rgba(113,100,239,.15) !important;
}

@media (max-width: 991px) {

    .modern-navbar {
        height: auto;
        min-height: 70px;
    }

    .nav-container {
        padding-left: 18px;
        padding-right: 18px;
    }

    .drive-brand {
        margin-left: 0;
    }

    .brand-text {
        font-size: 16px;
    }

    .navbar-collapse {
        margin-top: 15px;
        padding: 12px;
        border-radius: 16px;
        background: rgba(17,18,42,.96);
        border: 1px solid rgba(255,255,255,.08);
        box-shadow: 0 20px 45px rgba(0,0,0,.3);
    }

    .modern-link {
        padding: 12px 13px !important;
        margin: 2px 0;
        border-radius: 9px;
    }

    .modern-link:hover {
        background: rgba(255,255,255,.06);
    }

    .modern-link.active::after {
        display: none;
    }

    .modern-link.active {
        background: rgba(113,100,239,.13);
    }

    .login-item {
        margin-left: 0;
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid rgba(255,255,255,.07);
    }

    .login-button {
        width: 100%;
    }
}

@media (max-width: 575px) {

    .brand-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        font-size: 16px;
    }

    .brand-text {
        font-size: 15px;
    }

}

</style>