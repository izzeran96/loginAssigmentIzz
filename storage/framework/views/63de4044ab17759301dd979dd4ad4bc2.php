<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <h4>User List</h4>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $UserList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->created_at->format('Y-m-d H:i')); ?></td>
                    <td><?php echo e($user->created_by ?? 'Admin'); ?></td> 
                    <td>
                        <a href="<?php echo e(route('editUser', $user->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                        
                        <form action="<?php echo e(route('deleteUser', $user->id)); ?>" method="POST" style="display:inline-block;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this user?')">
                        Delete
                    </button>
                </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/LoginAssigment/resources/views/Dashboard/index.blade.php ENDPATH**/ ?>