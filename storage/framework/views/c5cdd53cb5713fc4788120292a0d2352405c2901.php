<?php $__env->startSection('title'); ?>
    create discussion
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">create Disscusion </div>

    <div class="card-body">
        <form action="<?php echo e(route("discussion.store")); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="title"> title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-controll">
                <label for="content"> content</label>
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="channel"> channel</label>
                <select class="form-control" name="channel" id="channel">
                    <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($channel->id); ?>"><?php echo e($channel->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
                <input type="submit" value="save" class="btn btn-primary my-2">
            
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/discussion/resources/views/discussions/create.blade.php ENDPATH**/ ?>