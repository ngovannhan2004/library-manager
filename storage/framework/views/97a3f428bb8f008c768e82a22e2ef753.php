<?php $__env->startSection('title_page'); ?>
    Edit User - Admin - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('name_user'); ?>
    <?php echo e(auth()->user()->name); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('email_user'); ?>
    <?php echo e(auth()->user()->email); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css_custom'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js_custom'); ?>
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
        $menu_parent = 'user';
        $menu_child = 'edit';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_component'); ?>
    User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_layout'); ?>
    Edit User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('actions_layout'); ?>
    <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List User
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_card'); ?>
    Edit User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_card'); ?>
    <form action="<?php echo e(route('admin.users.update', $user->id)); ?>" method="post" class="form-control-sm">
        <?php echo csrf_field(); ?>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Name </label>
            <input name="name" type="text" class="form-control form-control-solid"
                   placeholder="Enter name category" <?php echo e(old('name')); ?> value="<?php echo e($user->name); ?>">
        </div>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Email </label>
            <input name="email" type="text" class="form-control form-control-solid"
                   placeholder="Enter name category" <?php echo e(old('email')); ?> value="<?php echo e($user->email); ?>">
        </div>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Password </label>
            <input name="password" type="password" class="form-control form-control-solid"
                   placeholder="Enter name category" <?php echo e(old('password')); ?>>
        </div>
        <div class="mb-10">
            <label for="namsinh" class="required form-label">Năm sinh</label>
            <div class="input-group" id="kt_td_picker_localization" data-td-target-input="nearest"
                 data-td-target-toggle="nearest">
                <input type="text" class="form-control" name="namsinh"value="<?php echo e($user->namsinh); ?>" data-td-target="#kt_td_picker_localization"/>
                <span class="input-group-text" data-td-target="#kt_td_picker_localization"
                      data-td-toggle="datetimepicker">
        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
            </div>
        </div>

        <div class="mb-10">
            <label for="gender" class="required form-label">Giới Tính</label>
            <select name="gender" class="form-control form-control-solid">
                <option value="Nam" <?php echo e(old('gender') === 'Nam' ? 'selected' : ''); ?>>Nam</option>
                <option value="Nữ" <?php echo e(old('gender') === 'Nữ' ? 'selected' : ''); ?>>Nữ</option>
                <option value="Khác" <?php echo e(old('gender') === 'Khác' ? 'selected' : ''); ?>>Khác</option>
            </select>
        </div>

        <div class="mb-10">
            <label for="sdt" class="required form-label">Số Điện Thoại</label>
            <input name="sdt" type="text" class="form-control form-control-solid" placeholder="Nhập số điện thoại"<?php echo e(old('sdt')); ?>  value="<?php echo e($user->sdt); ?>">
        </div>
        <div class="mb-10">
            <label for="role" class="required form-label">Role</label>
            <select name="role" class="form-control form-control-solid" >
                <option value="admin" <?php echo e(old('author') === 'admin' ? 'selected' : ''); ?>>Admin</option>
                <option value="user" <?php echo e(old('author') === 'user' ? 'selected' : ''); ?>>User</option>
            </select>
        </div>
        <div class="mb-10">
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


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\web\library\resources\views/admin/pages/user/edit.blade.php ENDPATH**/ ?>