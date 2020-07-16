<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Admin Account
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                    </span>
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="form-horizontal " id="" method="post" action="" novalidate="novalidate">
                        <div class="form-group">
                            <label for="firstname" class="control-label col-lg-3">Username</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="username" name="username" value="<?php echo set_value('username') ?>" type="text">
                                <p class="help-block"><?php echo form_error('username') ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-lg-3">Password</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="password" name="password" value="<?php echo set_value('password') ?>" type="password">
                                <p class="help-block"><?php echo form_error('password') ?></p>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="control-label col-lg-3">Confirm Password</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="confirm_password" name="confirm_password" type="password">
                                <p class="help-block"><?php echo form_error('confirm_password') ?></p>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="control-label col-lg-3">Name</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="name" name="name" value="<?php echo set_value('name') ?>" type="text">
                                <p class="help-block"><?php echo form_error('name') ?></p>
                            </div>    
                        </div>
                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-3">Group ID</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="group_id" name="group_id" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Add</button>
                                <a href="<?php echo admin_url('admin/index') ?>">Show accounts</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>