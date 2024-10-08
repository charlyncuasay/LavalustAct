<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create</title>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Create User</h1>
        </div>
        <form action="<?= site_url('user/create'); ?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Last Name</td>
                    <td><input type='text' name='lname' class='form-control' required /></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type='text' name='fname' class='form-control' required /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type='email' name='email' class='form-control' required /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select name='gender' class='form-control' required>
                            <option value=''>Select gender...</option>
                            <option value='Male'>Male</option>
                            <option value='Female'>Female</option>
                            <option value='Other'>Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><textarea name='address' class='form-control' required></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a href='<?= site_url('user/read'); ?>' class='btn btn-danger'>Back to read records</a>
                    </td>
                </tr>
            </table>
        </form>
    </div> <!-- end .container -->
</body>

</html>