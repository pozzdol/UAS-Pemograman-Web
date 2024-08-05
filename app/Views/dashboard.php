<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
</head>

<body class="d-flex fs-6 fw-normal" style="background-color: #f4f6f9">
    <?= $this->include('components/sidebar') ?>


    <div class="w-100 fs-5">
        <div class="content-header my-3">
            <div class="container-fluid">
                <span class="fs-1 fw-semibold">Dashboard</span>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-between mb-3">
            <div class="info-box">
                <div class="info-icon">
                    <i class="fa-solid fa-user-injured"></i>
                </div>
                <div class="info-desc">
                    <span>Total Patients</span>
                    <span class="fw-bold">0</span>
                </div>
            </div>
            <div class="info-box">
                <div class="info-icon doctor">
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
                <div class="info-desc">
                    <span>Doctor on Call</span>
                    <span class="fw-bold">0</span>
                </div>
            </div>
            <div class="info-box">
                <div class="info-icon room">
                    <i class="fa-solid fa-hospital"></i>
                </div>
                <div class="info-desc">
                    <span>Room Available</span>
                    <span class="fw-bold">0</span>
                </div>
            </div>
            <div class="info-box">
                <div class="info-icon income">
                    <i class="fa-solid fa-money-bill-1-wave"></i>
                </div>
                <div class="info-desc">
                    <span>Total Income</span>
                    <span class="fw-bold">Rp. 0</span>
                </div>
            </div>
        </div>

        <div class="container d-flex">
            <div class="container">
                <div class="list-patients d-flex flex-column tabel-patient">
                    <span class="fw-bold">New Patient List</span>
                    <span class="fw-normal fs-6">This is the latest patient list</span>
                    <div class="table-responsive">
                        <table class="table table-hover fs-6">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="text-start">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Diseases</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td style="width: 30%">@mdo</td>
                                    <td style="width: 10%">@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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