<?php $__env->startSection('title_page'); ?>
    List Loan Slip - Admin - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('name_user'); ?>
    <?php echo e(auth()->user()->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css_custom'); ?>
    <link href="<?php echo e(asset('/admin/assets/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet"
          type="text/css"/>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js_custom'); ?>
    <script src="<?php echo e(asset('/admin/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <script !src="">
        $("#kt_datatable_horizontal_scroll").DataTable({
            dom: 'Bfrtip',
            order: [],
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    <?php
        $menu_parent = 'loan slip';
        $menu_child = 'index';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_component'); ?>
    Loan Slip
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_layout'); ?>
    List Loan Slip
<?php $__env->stopSection(); ?>
<?php $__env->startSection('actions_layout'); ?>
    <a href="<?php echo e(route('admin.loan_slips.create')); ?>" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-plus"></i> Add Loan Slip
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_card'); ?>
    List User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_card'); ?>
    <div class="table-responsive">
        <table id="kt_datatable_horizontal_scroll" class="table table-row-dashed gy-5 gs-7">
            <thead>
            <tr class="fw-semibold fs-6 text-gray-800">
                <th class="min-w-50"></th>
                <th class="min-w-50">ID</th>
                <th class="min-w-50px">Borrowed Days</th>
                <th class="min-w-50px">Payment Deadline</th>
                <th class="min-w-150px">Book</th>
                <th class="min-w-150px">Reader</th>
                <th class="min-w-100px">Note</th>
                <th class="min-w-200px">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $loan_slips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan_slip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>
                    <td><?php echo e($loan_slip->id); ?></td>
                    <td><?php echo e($loan_slip->borrowed_days); ?></td>
                    <td><?php echo e($loan_slip->payment_deadline); ?></td>
                    <td>
                        <?php $__currentLoopData = $loan_slip->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge badge-success"><?php echo e($book->book_code); ?> - <?php echo e($book->name); ?> </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($loan_slip->reader->reader_code); ?>-<?php echo e($loan_slip->reader->name); ?></td>
                    <?php if($loan_slip->daysDifference < 0): ?>
                        <td style="color: red;"><b>Trễ hạn <?php echo e(abs($loan_slip->daysDifference)); ?> ngày.</b></td>
                    <?php elseif($loan_slip->daysDifference == 0): ?>
                        <td style="color: orange;"><b>Đúng hạn trả.</b></td>
                    <?php elseif($loan_slip->daysDifference > 0): ?>
                        <td style="color: green;"><b>Sắp đến hạn trả.</b></td>
                    <?php endif; ?>


                    <td>
                        <a href="<?php echo e(route('admin.loan_slips.edit', $loan_slip->id)); ?>"
                           class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-primary mr-2" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <?php if($loan_slip->deleted_at == null): ?>
                            <a href="<?php echo e(route('admin.loan_slips.delete', $loan_slip->id)); ?>"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('admin.loan_slips.restore', $loan_slip->id)); ?>"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-warning" title="Restore">
                                <i class="fa fa-undo"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_card'); ?>
    

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_layout'); ?>
    <!--begin::Card-->
    <div class="card shadow-sm card-bordered">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible">
            <h3 class="card-title"><?php echo $__env->yieldContent('title_card'); ?></h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                   <i class="fa fa-angle-down"></i>
                </span>
            </div>
        </div>
        <div id="kt_docs_card_collapsible" class="collapse show">
            <div class="card-body">
                <?php echo $__env->yieldContent('content_card'); ?>
            </div>
            <div class="card-footer">
                <?php echo $__env->yieldContent('footer_card'); ?>
            </div>
        </div>
    </div>
    <!--end::Card-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\web\library\resources\views/admin/pages/loan_slip/index.blade.php ENDPATH**/ ?>