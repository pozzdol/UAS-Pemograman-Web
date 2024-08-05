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
    <?= $this->include('components/sidebar') ?>

    <div class="w-100 fs-5">
        <div class="content-header my-3">
            <div class="container-fluid">
                <span class="fs-1 fw-semibold">Show All Doctors</span>
            </div>
        </div>

        <div class="container-fluid">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="tabel-doctors">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width:30%">Name</th>
                            <th scope="col">Specialist</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($doctors) && is_array($doctors)) : ?>
                            <?php foreach ($doctors as $index => $doctor) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td><?= esc($doctor['name']) ?></td>
                                    <td><?= esc($doctor['specialist']) ?></td>
                                    <td><?= esc($doctor['phone']) ?></td>
                                    <td><?= esc($doctor['email']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('doctors/edit/' . $doctor['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?= base_url('doctors/delete/' . $doctor['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">No doctors found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
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