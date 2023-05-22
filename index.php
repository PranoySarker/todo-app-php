<?php
require "conn.php";

$data = $conn->query("SELECT * FROM tasks");

?>

<?php include "header.php"; ?>

<h3 class="text-primary text-center mb-3 mt-3">Todo-app</h3>

<form method="POST" action="insert.php" class="form-inline row g-3">
    <div class="col-6 mx-auto">
        <div class="col-auto">
            <input name="mytask" type="text" class="form-control" id="" placeholder="Enter your tasks here.." required>
        </div>
        <div class="col-auto mt-2">
            <button name="submit" type="submit" class="btn btn-primary mb-3">Create</button>
        </div>
    </div>
</form>


<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task Name</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <tbody>
            <?php while($rows = $data->fetch(PDO::FETCH_OBJ)): ?>
            <tr>
                <th scope="row"><?php echo $rows->id; ?></th>

                <td><?php echo $rows->name; ?></td>
                <td>
                    <a class="btn btn-danger" href="delete.php?del_id=<?php echo $rows->id ?>">Delete</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="update.php?upd_id=<?php echo $rows->id ?>">Update</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "footer.php"; ?>