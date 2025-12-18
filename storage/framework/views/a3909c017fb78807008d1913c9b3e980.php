<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h4>User Activity</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Activity</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($activity->activity); ?></td>
                    <td><?php echo e($activity->ip_address ?? '-'); ?></td>
                    <td><?php echo e($activity->user_agent ?? '-'); ?></td>
                    <td><?php echo e($activity->created_at->format('d-m-Y H:i:s')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">No activities yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/LoginAssigment/resources/views/Dashboard/activity.blade.php ENDPATH**/ ?>