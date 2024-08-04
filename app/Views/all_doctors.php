<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>All Doctors</title>
    <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
</head>

<body class="d-flex fs-6 fw-normal" style="background-color: #f4f6f9">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark no-scrollbar" style="width: 250px; height: 100vh; overflow-y: scroll">
        <div class="esa-logo">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="<?= base_url('images/logo.png') ?>" alt="ESA Hospital Logo" />
                <span class="fs-4">ESA HOSPITAL</span>
            </a>
            <hr />
        </div>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://secure.gravatar.com/avatar/33652581fab25b9236e9e9f3250fbb9e?s=80&d=mm&r=g" alt="User Avatar" width="32" height="32" class="rounded-circle me-2" />
                <span class="fs-5 fw-semibold"><?= substr(session()->get('nama_lengkap'), 0, 15) ?>.</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Sign out</a></li>
            </ul>
            <hr />
        </div>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="<?= base_url('dashboard') ?>" class="nav-link text-white hover" aria-current="page">
                    <div class="d-flex align-items-center gap-3">
                        <img src="<?= base_url('images/home.svg') ?>" alt="Home" />
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white hover sub-btn">
                    <div class="d-flex align-items-center gap-3">
                        <img src="<?= base_url('images/doctors.svg') ?>" alt="Doctors" />
                        <div class="d-flex justify-content-between w-100 align-items-start">
                            <span>Doctors</span>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </a>
                <div class="sub-menu">
                    <a href="<?= base_url('all-doctors') ?>" class="sub-item">All Doctors</a>
                    <a href="<?= base_url('add-doctors') ?>" class="sub-item">Add Doctors</a>
                    <a href="#" class="sub-item">Edit Doctors</a>
                </div>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white hover sub-btn">
                    <div class="d-flex align-items-center gap-3">
                        <img src="<?= base_url('images/patients.svg') ?>" alt="Doctors" />
                        <div class="d-flex justify-content-between w-100 align-items-start">
                            <span>Patients</span>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">All Patient</a>
                    <a href="#" class="sub-item">Add Patient</a>
                    <a href="#" class="sub-item">Edit Patient</a>
                </div>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white hover sub-btn">
                    <div class="d-flex align-items-center gap-3">
                        <img src="<?= base_url('images/room.svg') ?>" alt="Doctors" />
                        <div class="d-flex justify-content-between w-100 align-items-start">
                            <span>Inpatient Room</span>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">All Room</a>
                    <a href="#" class="sub-item">Add Room</a>
                    <a href="#" class="sub-item">Edit Room</a>
                </div>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white hover sub-btn">
                    <div class="d-flex align-items-center gap-3">
                        <img src="<?= base_url('images/payment.svg') ?>" alt="Doctors" />
                        <div class="d-flex justify-content-between w-100 align-items-start">
                            <span>Payment</span>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">All Payment</a>
                    <a href="#" class="sub-item">Add Patient</a>
                    <a href="#" class="sub-item">Edit Patient</a>
                    <a href="#" class="sub-item">Invoice</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="w-100 fs-5">
        <div class="content-header my-3">
            <div class="container-fluid">
                <span class="fs-1 fw-semibold">Show All Doctors</span>
            </div>
        </div>

        <div class="tabel-doctors">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Specialist</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data rows go here -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".sub-btn").click(function() {
                console.log("Doctors button clicked");

                const subMenu = $(this).next(".sub-menu");

                if (subMenu.is(":visible")) {
                    subMenu.slideUp(400);
                } else {
                    subMenu.slideDown(400);
                }

                $(this).find(".fa-caret-down").toggleClass(".fa-caret-up");
            });
        });
    </script>
</body>

</html>