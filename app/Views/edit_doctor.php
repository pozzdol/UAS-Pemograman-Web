<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Doctor</title>
    <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
</head>

<body class="d-flex fs-6 fw-normal" style="background-color: #f4f6f9">
    <?= $this->include('components/sidebar') ?>

    <div class="w-100 fs-5">
        <div class="content-header my-3">
            <div class="container-fluid">
                <span class="fs-1 fw-semibold">Edit Doctor</span>
            </div>
        </div>

        <div class="container-fluid">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="row form-container">
                <div class="col-12">
                    <form action="<?= base_url('doctors/update/' . $doctor['id']) ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= esc($doctor['name']) ?>" required />
                        </div>
                        <div class="mb-3">
                            <label for="specialist" class="form-label">Specialist</label>
                            <select class="form-select" id="specialist" name="specialist" required>
                                <option value="" disabled>Select Specialist</option>
                                <option value="Kulit" <?= $doctor['specialist'] == 'Kulit' ? 'selected' : '' ?>>Kulit</option>
                                <option value="THT" <?= $doctor['specialist'] == 'THT' ? 'selected' : '' ?>>THT</option>
                                <option value="Umum" <?= $doctor['specialist'] == 'Umum' ? 'selected' : '' ?>>Umum</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= esc($doctor['email']) ?>" required />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?= esc($doctor['phone']) ?>" required />
                        </div>
                        <div class="d-flex w-100">
                            <button type="submit" class="btn btn-primary ms-auto" style="width: 100px">Update</button>
                        </div>
                    </form>
                </div>
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