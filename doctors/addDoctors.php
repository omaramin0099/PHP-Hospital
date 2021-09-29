<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../general/configDB.php';
include '../general/functions.php';

?>

<?php
auth();

// insert========================================
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $fieldID = $_POST['fieldID'];

    $insert = "INSERT INTO `doctors` VALUES (NULL, '$name', $fieldID)";
    $i = mysqli_query($connect, $insert);
    test($i, 'insert');
    header("location: /hospital/doctors/addDoctors.php");
}
// $reset = "ALTER TABLE `doctors` AUTO_INCREMENT = 0";
// mysqli_query($connect, $reset);



// select========================================


$select = "SELECT * FROM field";
$s = mysqli_query($connect, $select);


// edit========================================
$uName ="";
$edit = FALSE;
if (isset($_GET['edit'])) {

    $ID = $_GET['edit'];
    $edit = TRUE;
    $editSelect = "SELECT * FROM doctors WHERE ID = $ID";
    $es = mysqli_query($connect, $editSelect);
    foreach ($es as $data) {
        $uName = $data['name'];
    }
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $fieldID = $_POST['fieldID'];
        $update = "UPDATE `doctors` SET name = '$name', fieldID = $fieldID WHERE ID = $ID";
        mysqli_query($connect, $update);
        $uName ="";
        $edit = FALSE;
        header("location: /hospital/doctors/listDoctors.php");
    }
}


?>

<!-- ==================================================================================================== -->

<!-- <link rel="stylesheet" href="/hospital/css/add.css"> -->

<h1 class="text-center text-primary display-1 my-5 py-3">
    <?php if(!$edit){
    echo "Add doctor";}
    else{
    echo "Update data";
    }?>
</h1>

    <div class="container col-7">
        <div class="card">
        <div class="card-body">
            
            <form method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $uName ?>" placeholder="Enter your Name">
                </div>
                <div class="form-group">
                    <label>Field</label>
                    <!-- <input type="number" class="form-control" name="fieldID"> -->
                    <select class="form-control" name="fieldID">
                        <?php foreach ($s as $data) { ?>
                            <option value="<?php echo $data['ID'] ?>"><?php echo $data['field'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if (!$edit) { ?>
                    <button name="send" class="btn btn-primary btn-block w-50 mx-auto">Send Data</button>
                    <?php } else { ?>
                        <button name="update" class="btn btn-info btn-block w-50 mx-auto">Update</button>
                <?php } ?>
            </form>
            
        </div>
    </div>
</div>


<!-- ======================== -->

<!-- ========================= -->

<?php
include '../shared/foot.php'
?>