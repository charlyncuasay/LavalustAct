<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1f1f1f, #000);
            color: #fff;
            font-family: "Arial", sans-serif;
        }

        .card {
            background: linear-gradient(145deg, #292929, #1c1c1c);
            color: #fff;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
        }

        .card-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            font-weight: bold;
            text-align: center;
            font-size: 1.5rem;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .form-control,
        .form-select {
            background: #222;
            color: #fff;
            border: 1px solid #444;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.5);
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            color: #fff;
            box-shadow: 0 4px 10px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            background: #5a6268;
            box-shadow: 0 6px 15px rgba(90, 98, 104, 0.5);
        }

        .container {
            max-width: 600px;
        }

        .invalid-feedback {
            color: #f8d7da;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                Create User
            </div>
            <div class="card-body">
                <form id="createForm" novalidate>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter last name" required>
                        <div class="invalid-feedback">Last name is required.</div>
                    </div>
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter first name" required>
                        <div class="invalid-feedback">First name is required.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email address" required>
                        <div class="invalid-feedback">A valid email is required.</div>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option value="" disabled selected>Select gender...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="invalid-feedback">Please select a gender.</div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter address" required></textarea>
                        <div class="invalid-feedback">Address is required.</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" id="addButton" class="btn btn-primary">Add User</button>
                        <button type="button" id="backButton" class="btn btn-secondary">Back to Records</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#addButton').on('click', function () {
                const form = $('#createForm')[0];

                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    return;
                }

                const formData = $('#createForm').serialize();

                $.ajax({
                    url: "<?= site_url('user/create'); ?>",
                    method: "POST",
                    data: formData,
                    success: function (response) {
                        try {
                            const result = typeof response === "string" ? JSON.parse(response) : response;

                            if (result.status === "success") {
                                window.location.href = "<?= site_url('user/read'); ?>";
                            } else {
                                alert("Error: " + result.message);
                            }
                        } catch (e) {
                            alert("User created successfully.");
                            window.location.href = "<?= site_url('user/read'); ?>";
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("An error occurred. Please check the server response.");
                    }
                });
            });

            $('#backButton').on('click', function () {
                window.location.href = "<?= site_url('user/read'); ?>";
            });
        });
    </script>
</body>

</html>
