<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
    <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(url('items/update')); ?>" method="POST">
            <!-- item_name -->
            <div class="form-group">
                <label for="item_name">アイテム名</label>
                <input type="text" name="item_name" class="form-control" value="<?php echo e($item->item_name); ?>">
                <label for="item_name">最低価格</label>
                <input type="text" name="min_price" class="form-control" value="<?php echo e($item->min_price); ?>">
            </div>
            <!--/ item_name -->
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="<?php echo e(url('/')); ?>"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="<?php echo e($item->id); ?>" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            <?php echo e(csrf_field()); ?>

            <!--/ CSRF -->
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/cms/resources/views/itemsedit.blade.php ENDPATH**/ ?>