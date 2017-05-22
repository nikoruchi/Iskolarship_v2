<?php $__env->startSection('content'); ?>
<<<<<<< HEAD

=======
<style>
</style>
>>>>>>> f583e64ce5f12bf8ecf2b42ab001d736b0b81e36
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
						<div class="form">
<<<<<<< HEAD
							<div class="form-group">
=======
							<div class="form-group" id="compose-form">
>>>>>>> f583e64ce5f12bf8ecf2b42ab001d736b0b81e36
							<form name="formMsg" id="formMsg">
								<?php echo e(csrf_field()); ?>

								<input class="form-control" type="text" name="subject" id="subject" placeholder="Subject"/>
								<input class="form-control" type="text" name="to" id="to" placeholder="To"/>
								<textarea class="form-control" placeholder="Message" name="content" id="message_content"></textarea>
								<button class="btn btn-primary pull-right send" type="submit" name="send_message" id="send_message" href="javascript:void(0)">
									<span class="glyphicon glyphicon-send"></span>
								</button>
							</form>
<<<<<<< HEAD
=======
								
>>>>>>> f583e64ce5f12bf8ecf2b42ab001d736b0b81e36
							</div>
						</div>
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
											<input name="messages[]" data-id="<?php echo e($message->msg_id); ?>" type="checkbox" class="not-clickable select"/>
<<<<<<< HEAD
										</form>
										<p class="from"><strong><?php echo e($message->msg_sender); ?></strong></p>
=======
									
										</form>
										<?php if(Auth::user()->hasRole('student')): ?>
										<p class="from"><strong><?php echo e($message->yourmessages->user_student->student_fname); ?></strong></p>
										<?php elseif(Auth::user()->hasRole('sponsor')): ?>
										<p class="from"><strong><?php echo e($message->yourmessages->user_sponsor->sponsor_fname); ?></strong></p>
										<?php endif; ?>
>>>>>>> f583e64ce5f12bf8ecf2b42ab001d736b0b81e36
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

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="css/message.css"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>