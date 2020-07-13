<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/discussion')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item " >
                            <a class="badge nav-link badge-danger" href="<?php echo e(route("user.notifications")); ?>" style="color:#FFF ">
                                <?php echo e(auth()->user()->unreadNotifications()->count()); ?>

                                notifications
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="<?php echo e(Gravatar::src(auth()->user()->email)); ?>" style="width=40px ; height:40px; border-radius:50%">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php if(auth()->guard()->check()): ?>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-4">
                    <a href="<?php echo e(route('discussion.create')); ?>" class="btn btn-primary mb-2" style="width: 100%">Add Descussion </a>
                    <div class="card">
                        <div class="card-header">channels</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item">
                                <a href="" class="text-decoration-none">
                                    <?php echo e($channel->name); ?>

                                </a>
                            </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php if($errors->any()): ?>
                        <ul class="list-group">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item alert alert-danger"><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(session()->has('success')): ?>
                                <div class="alert alert-success"><?php echo e(session()->get('success')); ?></div>
                    <?php endif; ?>

                        <?php echo $__env->yieldContent('content'); ?>

                </div>

            </div>
        </div>
        <?php else: ?>
        <div class="container my-5">
            <?php if(!in_array(request()->path() ,
            ["login",
            "register"
            ])): ?>
            <div class="alert alert-danger"> to Add discussion  you needed to sign in or register  </div>
            <?php endif; ?>

            <?php if(!in_array(request()->path() ,
            ["login",
            "password/confirm",
            "password/email",
            "password/request",
            "password/update",
            "password/reset ",
            "register"
            ])): ?>
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary mb-2" style="width: 100%">login to Add Descussion </a>
                        <div class="card">
                            <div class="card-header">channels</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <a href="<?php echo e(route('discussion.index')); ?>?channel=<?php echo e($channel->slug); ?>" class="text-decoration-none">
                                        <?php echo e($channel->name); ?>

                                    </a>
                                </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                            <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            <?php else: ?>
                <?php echo $__env->yieldContent('content'); ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/discussion/resources/views/layouts/app.blade.php ENDPATH**/ ?>