<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../db/db_conn.php";
$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $age = htmlspecialchars($_POST['age']);

    if (empty($first_name)) {
        $errors['first_name'] = "First name is required!";
    }
    if (empty($last_name)) {
        $errors['last_name'] = "Last name is required!";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    }
    if (empty($phone)) {
        $errors['phone'] = "Phone is required!";
    } elseif (!preg_match("/^[0-9]+$/", $phone)) {
        $errors['phone'] = "Invalid phone number!";
    }
    if (empty($age)) {
        $errors['age'] = "Age is required!";
    } elseif (!is_numeric($age) || $age <= 15) {
        $errors['age'] = "Age must be over 15!";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO students (first_name, last_name, email, phone, age) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            echo "Error in preparing statement: " . mysqli_error($conn);
            exit;
        }
        mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $phone, $age);

        if (mysqli_stmt_execute($stmt)) {
            $success = true;
            header("Location: ../index.php");
        } else {
            echo "Error in executing statement: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}


?>
<?php include "../includes/header.php" ?>


<div class="container mt-5">
    <div class="row bg-info rounded mb-4 p-2 text-white">
        <h1>Add a new student </h1>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="col">
                        <?php if (isset($errors) && !empty($errors)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo "<h4>All fields are required!</h4>"; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($success) && !empty($success)) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo "<h4>Student record inserted successfully!</h4>"; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control <?php echo isset($errors['first_name']) ? 'is-invalid' : ''; ?>" name="first_name" aria-describedby="nameHelp">
                                <?php if (isset($errors['first_name'])) : ?>
                                    <div class="invalid-feedback">
                                        <?php echo $errors['first_name']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control <?php echo isset($errors['last_name']) ? 'is-invalid' : ''; ?>" name="last_name" aria-describedby="nameHelp">
                                <?php if (isset($errors['last_name'])) : ?>
                                    <div class="invalid-feedback">
                                        <?php echo $errors['last_name']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label"> Email Address</label>
                                <input type="text" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" name="email" aria-describedby="nameHelp">
                                <?php if (isset($errors['email'])) : ?>
                                    <div class="invalid-feedback">
                                        <?php echo $errors['email']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : ''; ?>" name="phone" aria-describedby="nameHelp">
                                <?php if (isset($errors['phone'])) : ?>
                                    <div class="invalid-feedback">
                                        <?php echo $errors['phone']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="age" class="form-label"> Age </label>
                                <input type="text" class="form-control <?php echo isset($errors['age']) ? 'is-invalid' : ''; ?>" name="age" aria-describedby="nameHelp">
                                <?php if (isset($errors['age'])) : ?>
                                    <div class="invalid-feedback">
                                        <?php echo $errors['age']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="../index.php" class="btn btn-secondary">Home</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "../includes/footer.php" ?>