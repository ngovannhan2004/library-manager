<?php $__env->startSection('title_page'); ?>
    List Reader - Admin - <?php echo e(config('app.name')); ?>

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
        $menu_parent = 'readers';
        $menu_child = 'index';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_component'); ?>
   Reader
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_layout'); ?>
    List Reader
<?php $__env->stopSection(); ?>
<?php $__env->startSection('actions_layout'); ?>
    <a href="<?php echo e(route('admin.readers.create')); ?>" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-plus"></i> Add Reader
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_card'); ?>
    List Reader
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_card'); ?>
    <div class="table-responsive">
        <table id="kt_datatable_horizontal_scroll" class="table table-row-dashed gy-5 gs-7">
            <thead>
            <tr class="fw-semibold fs-6 text-gray-800">
                <th class="min-w-50"></th>
                <th class="min-w-50">ID</th>
                <th class="min-w-100px">Name</th>
                <th class="min-w-100px">Address</th>
                <th class="min-w-100px">Phone</th>
                <th class="min-w-150px">Email</th>
                <th class="min-w-50px">Gender</th>
                <th class="min-w-100px">Year_bith</th>
                <th class="min-w-200px">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $readers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>

                    <td><?php echo e($reader->id); ?></td>
                    <td><?php echo e($reader->name); ?></td>
                    <td><?php echo e($reader->address); ?></td>
                    <td><?php echo e($reader->phone); ?></td>
                    <td><?php echo e($reader->email); ?></td>
                    <td><?php echo e($reader->gender); ?></td>
                    <td><?php echo e($reader->books() ->count()); ?></td>


                    <td>
                        <a href="<?php echo e(route('admin.readers.edit', $reader->id)); ?>"
                           class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-primary mr-2" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <?php if($reader->deleted_at == null): ?>
                            <a href="<?php echo e(route('admin.readers.delete', $reader->id)); ?>"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('admin.readers.restore', $reader->id)); ?>"
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


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\web\library\resources\views/admin/pages/readers/index.blade.php ENDPATH**/ ?>