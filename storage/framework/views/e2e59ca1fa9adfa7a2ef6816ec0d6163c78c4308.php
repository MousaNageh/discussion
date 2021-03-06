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

            <?php if($discusion->bestReply): ?>
                <div class="alert alert-success">
                    <h4 class="text-center">best reply</h5>

                    <div class="card">
                        <div class="card-header">
                            <div class=" font-weight-bold">
                                <img src="<?php echo e(Gravatar::src($discusion->bestReply->owner->email)); ?>" style="width=40px ; height:40px; border-radius:50%">
                                <?php echo e($discusion->bestReply->owner->name); ?>

                            </div>
                            <div class="card-body">
                                <?php echo $discusion->bestReply->content; ?>

                                <div class=" font-italic font-weight-bold">
                                    replied at : <?php echo e($discusion->bestReply->created_at); ?>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($replies->count()>0): ?>
                <div class="crad" style="padding-bottom: 6px" >
                    <div class="card-header">
                        <?php if($discusion->bestReply): ?>
                        <h3 class="text-center">read more replies</h3>
                        <?php else: ?>
                        <h3 class="text-center">read  replies</h3>
                        <?php endif; ?>

                    </div>
                    <div class="card-body">
                        <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-success">
                                <div class="d-flex justify-content-between">
                                    <div class=" font-weight-bold">
                                        <img src="<?php echo e(Gravatar::src($reply->owner->email)); ?>" style="width=40px ; height:40px; border-radius:50%">
                                        <?php echo e($reply->owner->name); ?>

                                    </div>
                                    <div>
                                        <?php if(auth()->user()->id==$discusion->user_id): ?>
                                        <form action="<?php echo e(route('discussion.reply.bestReplay',['discussion'=>$discusion->slug,'reply'=>$reply->id])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="submit" value="make it a best reply" class="btn btn-secondary btn-sm">
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="my-4 font-italic">
                                    <?php echo $reply->content; ?>

                                </div>
                                <div class=" font-italic font-weight-bold">
                                replied at : <?php echo e($reply->created_at); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php echo e($replies->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h4>add reply</h4>
        </div>
        <div class="card-body">
            <?php if(auth()->guard()->check()): ?>
            <form action="<?php echo e(route('reply.store',$discusion->slug)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="content"> reply</label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">
                    <input type="submit" value="add replay" class="btn btn-success">
                </div>
            </form>
            <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary mb-2" style="width: 100%">login to Add reply</a>
            <?php endif; ?>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/discussion/resources/views/discussions/show.blade.php ENDPATH**/ ?>