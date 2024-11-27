<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Table with DataTables</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <style>
        body {
            background-color: black;
            color: white;
        }

        thead th {
            background-color: black;
            color: white;
            text-align: center;
        }

        tbody tr {
            background-color: white;
            color: black;
        }

        table.table {
            border: 2px solid white;
        }

        td,
        th {
            text-align: center;
            vertical-align: middle;
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .dataTables_wrapper .dataTables_filter label,
        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            color: white;
        }

        .dataTables_wrapper .dataTables_filter input {
            color: white;
            background-color: black;
            border: 1px solid white;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            color: #6c757d !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #007bff;
            color: white !important;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center">Records</h2>
        <a class="btn btn-primary mb-4" role="button" href="<?= site_url('user/create'); ?>">Create</a>

        <table id="userTable" class="table table-bordered table-striped table-hover rounded" style="color: white;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $u): ?>
                    <tr>
                        <td><?= $u['id'] ?></td>
                        <td><?= $u['cgc_last_name'] ?></td>
                        <td><?= $u['cgc_first_name'] ?></td>
                        <td><?= $u['cgc_email'] ?></td>
                        <td><?= $u['cgc_gender'] ?></td>
                        <td><?= $u['cgc_address'] ?></td>
                        <td>
                            <a href="<?= site_url('user/update/' . $u['id']); ?>" class="btn btn-success btn-sm">Update</a>
                            <a href="<?= site_url('user/delete/' . $u['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                paging: true, 
                searching: true, 
                ordering: true, 
                pageLength: 5, 
                columnDefs: [
                    { targets: [6], orderable: false } 
                ]
            });
        });
    </script>
</body>

</html>
