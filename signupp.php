<?php
    require_once './tools/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
    require_once('./includes/login-signup/head.log.sig.php')
?>
<body>
    <div class="f-container container-fluid">
        <div class="my-container container-fluid">
        <div class="f-row row d-flex justify-content-center align-items-center">
            <div class="c-row row d-flex justify-content-center align-items-center">
                <div class="nest-first-col col-12">
                    <form action="" method="post">
                        <div class="namesfl row">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Shan Khair" required value="<?php if(isset($_POST['firstName'])){ echo $_POST['firstName']; } ?>">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Jikiri" required value="<?php if(isset($_POST['lastName'])){ echo $_POST['lastName']; } ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="next-sec-col col-12">
                    sc
                </div>
            </div>

            sec column
        </div>
        </div>
    </div>
    <?php
        require_once('./includes/login-signup/js.php');
    ?>
</body>
</html>