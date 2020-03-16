<script>
    <?php
$notification_for = "";
if(isset($_GET['op'])){
    $op = $_GET['op'];
    $page = $_GET['page'];
    $p = $_GET['p'];
    switch($page){
        case "student":
            $notification_for = "Student";
            break;
        case "branch":
            $notification_for = "Branch";
            break;
        case "subject":
            $notification_for = "Subject";
            break;
    }
    if($op == "ins" && $p=="success"){
?>
    $.toast({
        heading: "Recorded Inserted!",
        text: "<?php echo $notification_for;?> Successfully Inserted.",
        position: "top-right",
        loaderBg: "#5ba035",
        icon: "success",
        hideAfter: 3e3,
        stack: 1
    })
 <?php
    }else if($op == "edit" && $p == "success"){
    ?>
    $.toast({
        heading: "Recorded Updated!",
        text: "<?php echo $notification_for;?> Successfully Updated.",
        position: "top-right",
        loaderBg: "#5ba035",
        icon: "success",
        hideAfter: 3e3,
        stack: 1
    })
    <?php
    }
}
?>
</script>