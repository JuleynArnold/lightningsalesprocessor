<?php
include_once "includes/header.php";
?>

        <!-- Main Body Start -->
        <body>
           <div class="row">
                <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <h2 align="center">Change Password</h2><br>
                    <form role="form" action="Change Pass.php" method="POST">
                        <div class="form-group">
                            <label for="currentpass">Current Password</label>
                            <input type="password" class="form-control" name="currentpass">
                        </div>
                        <div class="form-group">
                            <label for="newpass">New Password</label>
                            <input type="password" class="form-control" name="newpass">
                        </div>
                        <div class="form-group">
                            <label for="newpass2">Re-enter New Password</label>
                            <input type="password" class="form-control" name="newpass2">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" style="width:100px">Confirm</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </body>
        <!-- Main Body End -->
<?php
include_once "includes/footer.php";
?>