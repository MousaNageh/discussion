<?php $__env->startSection('title'); ?>
    disscussions
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $discussions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="<?php echo e(Gravatar::src($discussion->author->email)); ?>" style="width=40px ; height:40px; border-radius:50%">
                    <span> <strong><?php echo e($discussion->author->name); ?> </strong></span>
                </div>
                <div>
                <a href="<?php echo e(route("discussion.show",$discussion->slug)); ?>" class="btn btn-success btn-sm">view</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 class="h4 text-center"><?php echo e($discussion->title); ?> </h2>

        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo e($discussions->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/discussion/resources/views/discussions/index.blade.php ENDPATH**/ ?>