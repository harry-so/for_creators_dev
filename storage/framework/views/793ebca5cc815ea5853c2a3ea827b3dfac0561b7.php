<!-- resources/views/items.blade.php -->

<?php $__env->startSection('content'); ?>
<!-- Bootstrapの定形コード… -->
<div class="card-body">
    <div class="card-title">
        アイテム登録
    </div>
    <!-- バリデーションエラーの表示に使用-->
    <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ログインしたユーザーしか投稿できない -->
    <?php if(Auth::check()): ?>
    <!-- 本登録フォーム -->
    <form action="<?php echo e(url('items')); ?>" method="POST" class="form-horizontal">
        <?php echo e(csrf_field()); ?>

        <!-- 本のタイトル -->
        <div class="form-group">
            <div class="card-title">
                アイテム名
            </div>
            <div class="col-sm-6">
                <input type="text" name="item_name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="card-title">
                最低価格
            </div>
            <div class="col-sm-6">
                <input type="number" name="min_price" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="card-title">
                紹介
            </div>
            <div class="col-sm-6">
                <input type="textbox" name="item_desc" class="form-control">
            </div>
        </div>
        <!-- アイテム 登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    出品
                </button>
            </div>
        </div>
    </form>
    <?php endif; ?>
    <!-- 現在の本 -->
    <?php if(count($items) > 0): ?>
    <div class="card-body">
        <div class="card-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>アイテム一覧</th>
                    <th>&nbsp;</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody?>
                    <tr>
                        <th>アイテム名</th>
                        <th>出品者</th>
                        <th>最低価格</th>
                        <th>商品紹介</th>
                        <th>Delete</th>
                        <th>Update</th>
                        <th>Fav</th>
                    </tr>
                </tbody>  
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tfoot>    
                    <tr>
                        <!-- 本タイトル -->
                        <td class="table-text">
                            <div><?php echo e($item->item_name); ?></div>
                        </td>
                        <!-- 紹介者 -->
                        <td class="table-text">
                            <div><?php echo e($item->user->name); ?></div>
                        </td>
                        <!-- 最低価格 -->
                        <td class="table-text">
                            <div><?php echo e($item->min_price); ?></div>
                        </td>
                        <!-- 紹介 -->
                        <td class="table-text">
                            <div><?php echo e($item->item_desc); ?></div>
                        </td>
                        <!-- 本: 削除ボタン -->
                        <td>
                            <form action="<?php echo e(url('item/'.$item->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>

                                <button type="submit" class="btn btn-danger">
                                    削除
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="<?php echo e(url('itemsedit/'.$item->id)); ?>" method="GET"> <?php echo e(csrf_field()); ?>

                                <button type="submit" class="btn btn-primary">
                                    更新
                                </button>
                            </form>
                        </td>
                        
                        <td>
                        <?php if(Auth::check()): ?>
	                        <?php if(Auth::id() != $item->user_id && $item->fav_user()->where('user_id',Auth::id())->exists() !== true): ?>
                            <form action="<?php echo e(url('item/fav/'.$item->id)); ?>" method="POST"> <?php echo e(csrf_field()); ?>

                                <button type="submit" class="btn btn-primary">
                                    お気に入り
                                </button>
                            </form>
                            <?php endif; ?>
                        <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tfoot>
            </table>
        </div>
    </div>
    <?php endif; ?>

</div>

<?php if( Auth::check()): ?>
<?php if(count($fav_items) > 0): ?>
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>お気に入り一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        <?php $__currentLoopData = $fav_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fav_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <!-- 投稿タイトル -->
                                <td class="table-text">
                                    <div><?php echo e($fav_item->item_name); ?></div>
                                </td>
                                 <!-- 投稿詳細 -->
                                <td class="table-text">
                                    <div><?php echo e($fav_item->item_desc); ?></div>
                                </td>
                                <!-- 投稿者名の表示 -->
                                <td class="table-text">
                                    <div><?php echo e($fav_item->user->name); ?></div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>		
    <?php endif; ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/cms/resources/views/items.blade.php ENDPATH**/ ?>