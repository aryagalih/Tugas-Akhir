<?php 
    require_once('partials/header.php');
 ?>

<section>
    <div class="clearfix"></div>
    <div class="content-wrapper">
        <h2 style=" margin-left: 25px;">Setting</h2>
        <li class="dropdown-divider"></li>
        <div class="container-fluid">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                <div class="col-lg-9">
                    <input class="form-control" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                <div class="col-lg-9">
                    <input class="form-control" type="password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Konfirm password</label>
                <div class="col-lg-9">
                    <input class="form-control" type="password">
                </div>
            </div>
        </div>
    </div>

</section>

<?php  
    require_once('partials/footer.php')
?>