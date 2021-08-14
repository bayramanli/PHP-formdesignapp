<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/jqueryui/jquery-ui.min.js"></script>
<script src="assets/formbuilder/js/form-builder.min.js"></script>
<script src="js/custom.js"></script>
<!-- Bootstrap-->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        <?php
        if (isset($_SESSION['messageManagement'])) : ?>
            messageManagement(<?php echo $_SESSION['messageManagement']['status']; ?>, <?php echo $_SESSION['messageManagement']['message']; ?>);
        <?php unset($_SESSION['messageManagement']);
        endif; ?>
    });
</script>
</body>

</html>