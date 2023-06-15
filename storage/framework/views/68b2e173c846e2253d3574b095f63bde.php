<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width-device-width, initial-scale=1.0">
    <title> To Do List </title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/mdb.min.css" />
    <script type="text/javascript" src="js/mdb.min.js"></script>
</head>
<body style="background-color:cornflowerblue;"">
    <p><center>
    <div class = "container w-25 mt-5">
        <div class = "card shadow-sm">
            <div class = "card-body">
                <h3>To Do List</h3>
                <form action = "<?php echo e(route('store')); ?>" method = "POST" autocomplete = "off">
                    <?php echo csrf_field(); ?>
                    <div class = "input-group">
                        <input type = "text" name = "content" class = "form-control" 
                            placeholder = "Add your new todo">
                        <button type = "submit" class = "btn btn-dark btn-sm px-4 "><i class = "fas fa-plus"></i></button>
                    </div>
                </form>
                <?php if(count($todolists)): ?>
                <ul class = "list-group list-group-flush mt-3">
                    <?php $__currentLoopData = $todolists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todolist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class = "list-group-item">
                            <form action = "<?php echo e(route('destroy', $todolist -> id)); ?>" method = "POST">
                                <?php echo e($todolist -> content); ?>

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type = "submit" class = "btn btn-link btn-sm float-end">
                                    <i class = "fas fa-trash">
                                    </i>
                                </button>
                            </form>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php else: ?>
                <p class = "text-center mt-3">No Tasks!!!</p>
                <?php endif; ?>
            </div>
            <?php if(count($todolists)): ?>
                <div class = "card-footer">
                    You have <?php echo e(count($todolists)); ?> pending tasks.
                </div>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </div>
    </center></p>
</body>
</html><?php /**PATH /Users/appleervin/Documents/Coding?/protoToDoList/resources/views/home.blade.php ENDPATH**/ ?>