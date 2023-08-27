<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php $title = "Users"; ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<!-- Content Start -->
<div class="content">
    <?php include('includes/nav.php'); ?>
    <?php 
    if (isset($_POST['delete_btn'])) {
        $id = mysqli_real_escape_string($co, $_POST['delete_id']);
        $email = mysqli_real_escape_string($co, $_POST['delete_email']);

        $sql = "DELETE FROM `auth_user` WHERE id = '$id' ";
        $result = mysqli_query($co, $sql);
        if ($result) {
            $_SESSION['status']= "User <b>".$email."</b> Deleted!";
        } else {
            $_SESSION['status']= "Unable to delete User <b>".$email."</b>.";
            echo "Error: " . $sql . "<br>" . mysqli_error($co);
        }

    }
    ?>

    <!-- Success Alert Start -->
    <?php
    if (isset($_SESSION['success']) && $_SESSION["success"] != '') {
    ?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class=" rounded h-100">
                        <!-- <div class="alert alert-success" role="alert">
                            User Successfully added
                        </div> -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['success'];
                            unset($_SESSION['success']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Success Alert End -->

    <!-- Delete Alert Start -->
    <?php
    if (isset($_SESSION['status']) && $_SESSION["status"] != '') {
    ?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class=" rounded h-100">
                        <!-- <div class="alert alert-success" role="alert">
                            User Successfully added
                        </div> -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['status'];
                            unset($_SESSION['status']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Delete Alert End -->

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Users
                        <a href="add-user.php">
                            <button type="button" class="btn btn-outline-primary m-2" style="float: right;">
                                <i class="bi-plus-square-dotted me-2"></i>Create
                            </button>
                        </a>
                    </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <!-- <th scope="col">Username</th> -->
                                    <th scope="col">Email</th>
                                    <th scope="col">Super User</th>
                                    <th scope="col">Joining Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //fetching patient information
                                $sql = "SELECT * FROM `auth_user`";
                                $result = mysqli_query($co, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row["id"];
                                        $first_name = $row["first_name"];
                                        $last_name = $row["last_name"];
                                        $username = $row["username"];
                                        $email = $row["email"];
                                        $super_user = $row['is_superuser'];
                                        $joining = $row['date_joined'];
                                        $status = $row['is_active'];
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td><?php echo $first_name; ?></td>
                                            <td><?php echo $last_name; ?></td>
                                            <!-- <td><?php echo $username; ?></td> -->
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $super_user; ?></td>
                                            <td><?php echo $joining; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td>
                                                <form action="edit-user.php" method="post">
                                                    <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                                                    <button type="submit" name="edit_btn" class="btn btn-success m-2">Edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="tbl-users.php" method="post">
                                                    <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="delete_email" value="<?php echo $email; ?>">
                                                    <button type="submit" name="delete_btn" class="btn btn-danger m-2">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Table End -->





    <?php include('includes/footer.php'); ?>
    <?php include('includes/scripts.php'); ?>