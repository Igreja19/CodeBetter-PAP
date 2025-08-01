<?php
    $flag = false;
    $message = "";
    $message_class = "";
    if (isset($_SESSION['success'])) {

        $flag = true;
        $message = $_SESSION['success']; 
        $message_class =  "success";
        unset($_SESSION['success']);

    } elseif (isset($_SESSION['error'])) {

        $flag = true;
        $message = $_SESSION['error']; 
        $message_class =  "error";
        unset($_SESSION['error']);
    }
?>
<?php if ($flag) { ?>
<div id="flash-messages" class="flash-messages <?php echo $message_class; ?>">
    <p>
        <?php echo $message; ?>
    </p>
</div>

<script>
    var flashMessageContainer = document.getElementById("flash-messages");
    setTimeout(function() {
        flashMessageContainer.classList.add("slideUp");
    }, 4000);
</script>

<?php } ?>