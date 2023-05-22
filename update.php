<?php
require("conn.php");

if(isset($_GET['upd_id'])){

    $id = $_GET['upd_id'];

    $data = $conn->query("SELECT * FROM tasks WHERE id ='$id'");

    // print_r($data);

    $rows = $data->fetch(PDO::FETCH_OBJ);

    // print_r($rows);

    if(isset($_POST['submit'])){
        $task = $_POST['mytask'];
      
        $update = $conn->prepare("UPDATE tasks SET name = :name where id = '$id'");
      
        $update->execute([':name' => $task]);
      
        header("location: index.php");
      }


}


?>
<?php include "header.php"; ?>

<body>
    <form method="POST" action="update.php?upd_id=<?php echo $id;?>" class="form-inline row g-3">
        <div class="col-6 mx-auto mt-5">
            <div class="col-auto">
                <input name="mytask" type="text" class="form-control" id="" placeholder="Enter your tasks here.."
                    value="<?php echo $rows->name; ?>" required>
            </div>
            <div class="col-auto mt-2">
                <button name="submit" type="submit" class="btn btn-primary mb-3" value="update">Create</button>
            </div>
        </div>
    </form>


    <?php include "footer.php"; ?>