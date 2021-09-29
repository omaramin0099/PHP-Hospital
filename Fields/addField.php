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
    $name = $_POST['field'];

    $insert = "INSERT INTO `field` VALUES (NULL, '$name')";
    $i = mysqli_query($connect, $insert);
    test($i, 'insert');
    header("location: /hospital/Fields/addField.php");

}


// select========================================


$select = "SELECT * FROM field";
$s = mysqli_query($connect, $select);


// edit========================================
$uName ="";
$edit = FALSE;
if (isset($_GET['edit'])) {

    $ID = $_GET['edit'];
    $edit = TRUE;
    $editSelect = "SELECT * FROM field WHERE ID = $ID";
    $es = mysqli_query($connect, $editSelect);
    foreach ($es as $data) {
        $uName = $data['name'];
    }
    if (isset($_POST['update'])) {
        $name = $_POST['field'];
        $update = "UPDATE `field` SET field = '$name' WHERE ID = $ID";
        mysqli_query($connect, $update);
        $uName ="";
        $edit = FALSE;
        // header("location: /hospital/doctors/listDoctors.php");
    }
}


?>

<!-- ==================================================================================================== -->


<h1 class="text-center text-primary display-1 my-5 py-3">
    <?php if(!$edit){
    echo "Add Field";}
    else{
    echo "Update data";
    }?>
</h1>
<div class="container col-7">
    <div class="card">
        <div class="card-body">

            <form method="POST">
                <div class="form-group">
                    <label for="">Field</label>
                    <input type="text" class="form-control" name="field" value="<?php echo $uName ?>" placeholder="Enter field Name">
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




<?php
include '../shared/foot.php'
?>