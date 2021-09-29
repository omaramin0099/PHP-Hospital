<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../general/configDB.php';
include '../general/functions.php';


auth();


$select = "SELECT doctors.ID, doctors.name, field.field  FROM doctors JOIN field
           ON doctors.fieldID = field.ID";
$s = mysqli_query($connect, $select);


// delete==========================================================================

if(isset($_GET['delete'])){

    $ID = $_GET['delete'];
    $delete = "DELETE FROM `doctors` WHERE ID=$ID";
    $d = mysqli_query($connect, $delete);
    header("location: /hospital/doctors/listDoctors.php");
}
//edit=============================================================================




?>


<!-- ==================================================================================================== -->


<h1 class="text-center text-primary display-1 my-5 py-3">Doctors List</h1>
<div class="container col-7">
    <div class="card">
        <div class="card-body">

            <table class="table table-dark">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Field</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($s as $data) { ?>
                        <tr>
                            <td><?php echo $data['ID'] ?></td>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['field'] ?></td>
                            <td>
                                <a href="?delete=<?php echo $data['ID'] ?>" class="btn btn-danger">Delete</a>
                                <a href="/hospital/doctors/addDoctors.php?edit=<?php echo $data['ID'] ?>" class="btn btn-info ml-3">Edit</a>
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