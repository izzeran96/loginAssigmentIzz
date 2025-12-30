<?php $__env->startSection('content'); ?>
    <form action="" method="post" class="form">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo e($content->title); ?>" id="">
        </div>
        <br>
         <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" class="form-control" value="<?php echo e($content->tags); ?>" id="">
        </div>
        <br>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="" cols="30" rows="10"><?php echo e($content->content); ?></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Post A content">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/LoginAssigment/resources/views/Dashboard/cms/edit.blade.php ENDPATH**/ ?>