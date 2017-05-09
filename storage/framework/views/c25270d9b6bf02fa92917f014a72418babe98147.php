<?php $__env->startSection('content'); ?>
    <div class="container main-container">
        <div class="col-sm-6 col-sm-offset-3 headline">
            <div class="text-center">
                <h1>Iskolarship</h1>
                <h3><small>Ang iyong kaagabay sa broke mong buhay.</small></h3>
            </div>

            <form action="login" method="POST" id="login" class="overflow-a">

                <?php echo e(csrf_field()); ?>

                
                <div class="input-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input type="text" name="email" placeholder="Email Address" class="form-control" value="<?php echo e(old('email')); ?>"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>

                    

                </div>

                <div class="input-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input type="password" name="password" placeholder="Password" class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>                                
                </div>

                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>

                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>

                <!-- <div class="check-box pull-left">
                    <label><input type="checkbox" name="remember me"><span class="box"><span class="check"></span></span>&nbsp;<span class="label-text">Remember me</span></label>
                </div> -->
                <button type="submit" name="login" class="btn btn-success pull-right">Login&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></button>
            </form>

            <p class="instruction">You do not have an account yet? Click the button below.</p>
            <div class="dropdown">
                <button class="register-btn btn btn-primary" data-toggle="dropdown"><span class="glyphicon glyphicon-user register"><span class="register-icon">+</span></span>&nbsp;&nbsp;Register <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li class="dropdown-header">Register as?</li>
                    <li><a href="<?php echo e(url('registration/Student Form')); ?>"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Student</a></li>
                    <li><a href="<?php echo e(url('registration/Sponsor Form')); ?>"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;Sponsor</a></li>
                </ul>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.indexGuest", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>