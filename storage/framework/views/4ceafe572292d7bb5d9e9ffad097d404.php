<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-body">
            <a href="<?php echo e(route('cms.post')); ?>" class="btn btn-primary">Create A Contents</a>
            <table class="table">
                <tr>
                    <th>Post By</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
               <?php $__currentLoopData = $cmsContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                    <td><?php echo e($content->user->name); ?>

                         <br>
                      <?php echo e($content->created_at->diffForHumans()); ?>

                    </td>
                    <td><?php echo e($content->title); ?></td>
                    <td>
                        <?php echo e($content->content); ?>


                    </td>
                    <td><a class="btn btn-primary" href="<?php echo e(route('cms.edit', [
                        Str::slug($content->title),
                        $content->id
                    ])); ?>">Edit</td>
                </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/LoginAssigment/resources/views/Dashboard/cms/index.blade.php ENDPATH**/ ?>