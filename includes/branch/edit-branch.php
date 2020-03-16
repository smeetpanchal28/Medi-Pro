<?php 
    if(isset($_POST['edit_branch_btn'])) {
        $id = $_GET['id'];
        extract($_POST);
        $branch = new Branch();
        $branch->update($id, $branch_name, $branch_code);
        Functions::redirect("branch.php?op=edit&p=success&page=branch");
    }
?>
<?php 
    if( isset($_GET['id'] ) ) {
        $id = $_GET['id'];
        $branch = new Branch();
        $result_set = $branch->getBranchDetailsByID($id);
        if($row = mysqli_fetch_assoc($result_set))
            extract($row);
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
	$page_title = "Manage Branch";
	$breadcrumb = "
	<li class='breadcrumb-item'>Branch Management</li>
	<li class='breadcrumb-item active'>Edit Branch</li>";
	include_once("includes/top-bar.php");
	?>
        <!-- Start Page content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <form class="" method="post" action="#" name="edit_branch" id="edit_branch">
                                <h4>Branch Details</h4>
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <input type="text" class="form-control"
                                           required placeholder="Enter Branch Name"
                                           name="branch_name" id="branch_name"
                                           value="<?php echo $branch_name; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Branch Code</label>
                                    <input type="text" class="form-control"
                                           required placeholder="Enter Branch code"
                                           name="branch_code" id="branch_code"
                                           value="<?php echo $branch_code;?>" />
                                </div>

                                <div class="form-group">
                                    <div>
                                        <button type="submit"
                                                class="btn btn-custom waves-effect
                                                waves-light"
                                                name="edit_branch_btn"
                                                id="edit_branch_btn">
                                                    Submit
                                                </button>
                                        <button type="reset" class="btn btn-light waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
            <!-- container -->

        </div>
        <!-- content -->
        <?php 
            } else{
                echo "Something is Wrong";
            }
        ?>
        <?php include_once("includes/footer.php");?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
