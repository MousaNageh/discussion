<?php if(auth()->guard()->check()): ?>

<?php $__env->startSection('title'); ?>
    notifcations
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">notifcations</div>
    <div class="card-body">

            <ul class="list-group ">
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($notification->type=="App\Notifications\NewReplyAdded"): ?>
                <li class="list-group-item">
                    you have  a new reply on  <strong style="color: rgb(0, 128, 111)" ><?php echo e($notification->data["discussion"]["title"]); ?></strong>
                    <a href="<?php echo e(route("discussion.show",$notification->data["discussion"]["slug"])); ?>" class="btn btn-info float-right btn-sm"> view reply</a>
                </li>
                <?php endif; ?>
                <?php if($notification->type=="App\Notifications\ReplayAsbestReply"): ?>
                <li class="list-group-item">
                    you replay on  <strong style="color: rgb(0, 128, 111)" ><?php echo e($notification->data["bestReply"]["title"]); ?></strong> Discussion marked as best reply
                    <a href="<?php echo e(route("discussion.show",$notification->data["bestReply"]["slug"])); ?>" class="btn btn-info float-right btn-sm"> view reply</a>
                </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>



    </div>
</div>

<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/discussion/resources/views/user/notifcations.blade.php ENDPATH**/ ?>