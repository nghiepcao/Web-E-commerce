<?php if(isset($message) && $message):?>
    <div class="alert alert-warning ">
        <span class="alert-icon">
            <i class="fa fa-bell-o"></i>
        </span>
        <div class="notification-info">
            <ul class="clearfix notification-meta">
                <li class="pull-left notification-sender"><?php echo $message ?></li>
            </ul> 
        </div>
    </div>
<?php endif; ?>