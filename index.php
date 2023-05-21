<?php
require "conn.php";

$data = $conn->query("SELECT * FROM tasks");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-primary text-center mb-3 mt-3">Todo-app</h3>

    <form method="POST" action="insert.php" class="form-inline row g-3">
        <div class="col-6 mx-auto">
            <div class="col-auto">
                <input name="mytask" type="text" class="form-control" id="" placeholder="Enter your tasks here.."
                    required>
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
                    <th scope="col">Action</th>
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
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>