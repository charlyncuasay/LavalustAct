<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update User</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }

        .card {
            background-color: #1f1f1f;
            border: 1px solid #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            margin-top: 50px;
        }

        .card-header {
            background-color: #272727;
            color: #ffffff;
            font-size: 1.5rem;
            border-bottom: 1px solid #444;
        }

        .form-control,
        .form-select {
            background-color: #2a2a2a;
            color: #ffffff;
            border: 1px solid #555;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #333;
            color: #ffffff;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #a71d2a;
        }

        .invalid-feedback {
            color: #ff6b6b;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        Update User
                    </div>
                    <div class="card-body">
                        <form id="updateForm" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" id="lname" class="form-control" value="<?= $user['cgc_last_name']; ?>" required>
                                <div class="invalid-feedback">Please provide the last name.</div>
                            </div>
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" id="fname" class="form-control" value="<?= $user['cgc_first_name']; ?>" required>
                                <div class="invalid-feedback">Please provide the first name.</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" value="<?= $user['cgc_email']; ?>" required>
                                <div class="invalid-feedback">Please provide a valid email address.</div>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" class="form-select" required>
                                    <option value="Male" <?= ($user['cgc_gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?= ($user['cgc_gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                    <option value="Other" <?= ($user['cgc_gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                                <div class="invalid-feedback">Please select a gender.</div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea id="address" class="form-control" rows="3" required><?= $user['cgc_address']; ?></textarea>
                                <div class="invalid-feedback">Please provide the address.</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" id="updateBtn" class="btn btn-primary">Update</button>
                                <a href="<?= site_url('user/read'); ?>" class="btn btn-danger">Back to Records</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#updateForm').on('submit', function (event) {
                event.preventDefault();

                const formData = {
                    lname: $('#lname').val(),
                    fname: $('#fname').val(),
                    email: $('#email').val(),
                    gender: $('#gender').val(),
                    address: $('#address').val(),
                };

                $.ajax({
                    url: '<?= site_url("user/update/" . $user["id"]); ?>',
                    type: 'POST',
                    data: formData,
                    success: function () {
                        alert('User updated successfully!');
                        window.location.href = '<?= site_url("user/read"); ?>';
                    },
                    error: function (xhr, status, error) {
                        console.error('Error updating user:', error);
                        alert('An error occurred while updating the user.');
                    }
                });
            });
        });
    </script>
</body>

</html>
