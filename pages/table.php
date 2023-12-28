<?php
include "db/db_conn.php";
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

?>

<div class="container mt-5 px-4">
    <div class="row">
        <h1 class="text-center mb-4">Students List</h1>
    </div>
    <div class="row">
        <div class="card py-3">
            <div class="card-body">
                <a href="./pages/add_student.php" class="btn btn-primary mb-4 py-2">
                    <i class="fa-solid fa-plus"></i>
                    Add student
                </a>
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Age</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td><?php echo htmlspecialchars($row['age']); ?></td>
                                <td>
                                    <a href="./pages/edit.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-success me-3">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </a>
                                    <a href="./pages/delete.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>