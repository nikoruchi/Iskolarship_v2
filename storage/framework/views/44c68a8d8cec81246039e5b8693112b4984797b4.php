<?php $__env->startSection('content'); ?>
<style>
</style>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Messages</h3>
						<button class="compose btn btn-success btn-block" href="javascript:void(0)">COMPOSE</button>
						<button class="delete btn btn-danger btn-block" href="javascript:void(0)">DELETE</button>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div id="message-form" class="panel panel-default">
					<div class="panel-body">
						<!-- <div class="form"> -->
							<div id="compose-form">
							<form name="formMsg" id="formMsg">
								<?php echo e(csrf_field()); ?>

								<div class="">
									<input class="form-control" type="text" name="subject" id="subject" placeholder="Subject" value=""/>

										<span class="help-block">
											<!-- <strong></strong> -->
										</span>


								</div>
								<div class="">
<<<<<<< HEAD:storage/framework/views/511a3a7dd2f3a478daa8728de3d288c8ad5b3b68.php
								
									<input class="form-control" type="text" name="to" id="to" placeholder="To" value="<?php echo e(isset($email) ? $email : old('to')); ?>"/>

										<span class="help-block">
											
										</span>
										
=======
									<input class="form-control" type="text" name="to" id="to" placeholder="To" value="<?php echo e(empty($email)? '': $email[0]); ?>"/>
									<span class="help-block">
										<!-- <strong></strong> -->
									</span>
>>>>>>> f0c61e824889768a2c2ef02652eaadb137493b51:storage/framework/views/44c68a8d8cec81246039e5b8693112b4984797b4.php
								</div>
								<div class="">
									<textarea class="form-control" placeholder="Message" name="content" id="message_content" value=""></textarea>

							
										<span class="help-block">
											<!-- <strong></strong> -->
										</span>

								</div>
								<button class="btn btn-primary pull-right send" type="submit" name="send_message" id="send_message" href="javascript:void(0)">
									<span class="glyphicon glyphicon-send"></span>
								</button>
							</form>
								
							</div>
						<!-- </div> -->
					</div>
				</div>
			</div>
			<div class="col-sm-9 col-sm-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="btn-group btn-group-justified message-filter">
							<a href="javascript:void(0)" data-pg="<?php echo e($user->user_id); ?>" class="allbtn btn btn-default">All</a>
							<a href="javascript:void(0)" data-pg="<?php echo e($user->user_id); ?>" class="readbtn btn btn-default">Read</a>
							<a href="javascript:void(0)" data-pg="<?php echo e($user->user_id); ?>" class="unreadbtn btn btn-default">Unread</a>
						</div>
						<ul class="list-unstyled messages-container" id="messages-container">
							<?php $__currentLoopData = $inbox; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="message clickable" data-pg="<?php echo e($message->msg_id); ?>">
								<div class="panel panel-default">
									<div class="panel-body">
										<form class="select-form" id="formDel">
											<input name="messages[]" data-id="<?php echo e($message->msg_id); ?>" type="checkbox" class="not-clickable select cbox" value="<?php echo e($message->msg_id); ?>"/>
										</form>

										<?php if(Auth::user()->hasRole('student')): ?>
										<p class="from"><strong><?php echo e($message->msg_sender); ?></strong></p>
										<?php elseif(Auth::user()->hasRole('sponsor')): ?>
										<p class="from"><strong><?php echo e($message->msg_sender); ?></strong></p>
										<?php endif; ?>
										<p class="message-content"><?php echo e($message->msg_content); ?></p>
										<p class="time-stamp"><?php echo e($message->created_at->diffForHumans()); ?></p>
									</div>
								</div>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
	<script type="text/javascript" src="/js/script-messages.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="css/message.css"/>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>