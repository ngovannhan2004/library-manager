<?php $__env->startSection('title_page'); ?>
    Create Readers - Admin - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('name_user'); ?>
    <?php echo e(auth()->user()->name); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('email_user'); ?>
    <?php echo e(auth()->user()->email); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css_custom'); ?>
    <link href="<?php echo e(asset('/admin/assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js_custom'); ?>
    <script src="<?php echo e(asset('/admin/assets/plugins/global/plugins.bundle.js')); ?>"></script>
    <script>
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_localization"), {
            localization: {
                locale: "de",
                startOfTheWeek: 1,
                format: "dd/MM/yyyy"
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    <?php
        $menu_parent = 'readers';
        $menu_child = 'create';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_component'); ?>
    Create Readers
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_layout'); ?>
    Create Readers
<?php $__env->stopSection(); ?>
<?php $__env->startSection('actions_layout'); ?>
    <a href="<?php echo e(route('admin.readers.index')); ?>" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Readers
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_card'); ?>
    Create Readers
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_card'); ?>
    <form action="<?php echo e(route('admin.readers.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Name</label>
            <input type="text" name="name" id="exampleFormControlInput1" class="form-control" value="<?php echo e(old('name')); ?>">
        </div>

        <div class="mb-10">
            <label for="exampleFormControlInput2" class="required form-label">Address</label>
            <input type="text" name="address" id="exampleFormControlInput2" class="form-control" value="<?php echo e(old('address')); ?>">
        </div>

        <div class="mb-10">
            <label for="exampleFormControlInput3" class="required form-label">Phone</label>
            <input type="text" name="phone" id="exampleFormControlInput3" class="form-control" value="<?php echo e(old('phone')); ?>">
        </div>

        <div class="mb-10">
            <label for="exampleFormControlInput4" class="required form-label">Email</label>
            <input type="email" name="email" id="exampleFormControlInput4" class="form-control" value="<?php echo e(old('email')); ?>">
        </div>

        <div class="mb-10">
            <label for="gender" class="required form-label">Gender</label>
            <select name="gender" class="form-control form-control-solid">
                <option value="Nam" <?php echo e(old('gender') === 'Nam' ? 'selected' : ''); ?>>Nam</option>
                <option value="Nữ" <?php echo e(old('gender') === 'Nữ' ? 'selected' : ''); ?>>Nữ</option>
                <option value="Khác" <?php echo e(old('gender') === 'Khác' ? 'selected' : ''); ?>>Khác</option>
            </select>
        </div>
        <div class="mb-10">
            <label for="year_birth" class="required form-label">Year_birth</label>
            <div class="input-group" id="kt_td_picker_localization" data-td-target-input="nearest"
                 data-td-target-toggle="nearest">
                <input type="text" class="form-control" name="year_birth" data-td-target="#kt_td_picker_localization"/>
                <span class="input-group-text" data-td-target="#kt_td_picker_localization"
                      data-td-toggle="datetimepicker">
        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
            </div>
        </div>

        <div class="mb-10 mt-3">
            <button class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
                <i class="fa fa-save"></i> Save
            </button>
        </div>
    </form>
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


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\web\library\resources\views/admin/pages/readers/create.blade.php ENDPATH**/ ?>