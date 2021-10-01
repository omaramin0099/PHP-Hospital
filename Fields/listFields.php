<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../general/configDB.php';
include '../general/functions.php';



auth();

$select = "SELECT * FROM field";
$s = mysqli_query($connect, $select);


// delete==========================================================================

if (isset($_GET['delete'])) {

    $ID = $_GET['delete'];
    $delete = "DELETE FROM `field` WHERE ID=$ID";
    $d = mysqli_query($connect, $delete);
    header("location: /hospital/Fields/listFields.php");
}
//edit=============================================================================




?>


<!-- ==================================================================================================== -->
<link rel="stylesheet" href="../assets/Table/Table.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">



<h1 class="text-center text-primary display-1 my-5 py-3">Fields List</h1>


<div class="content">
    <div class="container">
        <div class="table-responsive custom-table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" class="text-center">Field</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($s as $data) { ?>
                        <tr scope="row">
                            <td><?php echo $data['ID'] ?></td>
                            <td class="text-center"><?php echo $data['field'] ?></td>
                            <td class="text-center">
                                <a href="?delete=<?php echo $data['ID'] ?>" class="btn btn-danger">Delete</a>
                                <a href="/hospital/Fields/addField.php?edit=<?php echo $data['ID'] ?>" class="btn btn-info ml-3">Edit</a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php
include '../shared/foot.php'
?>