<!-- head start  -->
<?php include_once 'components/head_start.php';
include 'PHP/function.php'; ?>
<!-- head end  -->

<title>Register Page</title>
<!-- page link  -->
<!-- page link end  -->

<!-- head start  -->
<?php include_once 'components/head_end.php';

$sql = "SELECT * FROM country";
$result = mysqli_query($conn, $sql);


?>
<!-- head end  -->


<div class="row">
    <div class="col-md-8">
        <div class="contact-page-form">
            <h2>Register form</h2>
            <form id="register_form">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input type="text" id="nameid" placeholder="Your Name" name="name" style=" width: 25rem;">
                        </div>
                        <span id="name_error" class="text-danger" style="margin-bottom: 8px; "></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input type="text" id="emailid" placeholder="E-mail" name="email" style=" width: 25rem;">
                        </div>
                        <span id="email_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input type="password" id="passwordid" placeholder="Password" name="password" style=" width: 25rem;   ">
                            <span id="password_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input type="password" id="c_passwordid" placeholder="Confirm Password" name="c_password" style=" width: 25rem;   ">
                            <span id="c_password_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <?php
                        $query = "select * from country";
                        $query_execute = mysqli_query($conn, $query); ?>
                        <select class="form-control" id="country" name="country" onchange="getcountry(this.value)" style="margin-top: 10px; width: 24rem; ">
                            <option value="">Country Name</option>;
                            <?php while ($result = mysqli_fetch_array($query_execute)) {
                                echo   "<option value='" .  $result['id'] . "'>" . $result['country'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <span id="country_error" class="text-danger"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" id="state" name="state" style=" width: 24rem;  margin-top: 10px ">
                        <option value="">State Name</option>
                    </select>
                    <span id="state_error" class="text-danger"></span>
                </div>
                <div class="single-input-fieldsbtn">
                    <input type="submit" id="register_submit" name="register_submit" value="Send Now" class="btn btn_get btn_get_two">
                </div>
        </div>
        </form>
    </div>
</div>
<!-- contact form end -->



<!-- script start  -->
<?php include_once 'components/script_start.php' ?>
<!-- script start  -->

<!-- page script  -->
<script src="js/common.js"></script>
<script src="js/register.js"></script>
<script src="asset/sweetalert2-11.4.0/package/dist/sweetalert2.js"></script>
<!-- page script  -->

<!-- script end  -->
<?php include_once 'components/script_end.php' ?>
<!-- script end  -->