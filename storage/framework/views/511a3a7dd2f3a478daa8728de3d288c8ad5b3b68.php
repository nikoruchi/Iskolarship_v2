<?php $__env->startSection('content'); ?>
<style>
</style>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Messages</h3>
						<button class="compose" href="javascript:void(0)"><span class="glyphicon glyphicon-pencil"></span> Compose</button>
						<button class="delete" href="javascript:void(0)"><span class="glyphicon glyphicon-trash"></span> Delete</button>
						<button class="sent" href="javascript:void(0)"><span class="glyphicon glyphicon-send"></span> Sent</button>
						<button class="markall" href="javascript:void(0)"><span class="glyphicon glyphicon-check"></span> Mark all</button>
						<button class="unmarkall" href="javascript:void(0)"><span class="glyphicon glyphicon-unchecked"></span> Unmark all</button>
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

									<input class="form-control" type="text" name="to" id="to" placeholder="To" value="<?php echo e(empty($email)? '': $email[0]); ?>"/>
									<span class="help-block">
										<!-- <strong></strong> -->
									</span>
								</div>
								<div class="">
									<textarea class="form-control" placeholder="Message" name="content" id="message_content" value=""></textarea>

							
										<span class="help-block">
											<!-- <strong></strong> -->
										</span>

								</div>
								<button class="btn btn-primary pull-right send" type="submit" name="send_message" id="send_message" href="javascript:void(0)">
									<span class="glyphicon glyphicon-send"></span> Send
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
	<script type="text/javascript" src="<?php echo e(asset('js/script-messages.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/message.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>