<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('cms.createPost')); ?>" method="post" class="form">
        <?php echo csrf_field(); ?>
        <?php echo method_field('post'); ?>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="">
        </div>

          <div class="form-group">
            <label for="tags">Tags:</label>
            <input type="text" name="tags" class="form-control" id="">
        </div>


        <div class="form-group">
             <h3>
                Post Content
            </h3>
            <textarea name="content" class="form-control" id="" cols="5" rows="10"></textarea>
        </div>
        
        <br>
        <input class="btn btn-primary" type="submit" value="Post A content">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/LoginAssigment/resources/views/Dashboard/cms/create.blade.php ENDPATH**/ ?>