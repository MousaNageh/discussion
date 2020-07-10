<?php $__env->startSection('title'); ?>
    <?php echo e($discusion->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="<?php echo e(Gravatar::src($discusion->author->email)); ?>" style="width=40px ; height:40px; border-radius:50%">
                    <span > <strong><?php echo e($discusion->author->name); ?></strong></span>
                </div>
                <div>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary btn-sm">back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 class="h4 text-center border-bottom " style="padding:10px"><?php echo e($discusion->title); ?> </h2>
            <?php echo $discusion->content; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/discussion/resources/views/discussions/show.blade.php ENDPATH**/ ?>