<!--begin::User account menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
                <img alt="Logo" src="<?php echo e(asset('/admin/assets/media/avatars/300-1.jpg')); ?>" />
            </div>
            <!--end::Avatar-->
            <!--begin::Username-->
            <div class="d-flex flex-column">
                <div class="fw-bold d-flex align-items-center fs-5"><?php echo $__env->yieldContent('name_user'); ?>
                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7"><?php echo $__env->yieldContent('email_user'); ?></a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="../../demo1/dist/account/overview.html" class="menu-link px-5">My Profile</a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="../../demo1/dist/apps/projects/list.html" class="menu-link px-5">
            <span class="menu-text">My Projects</span>
            <span class="menu-badge">
													<span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
												</span>
        </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="../../demo1/dist/account/statements.html" class="menu-link px-5">My Statements</a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->

    <!--begin::Menu item-->
    <div class="menu-item px-5 my-1">
        <a href="../../demo1/dist/account/settings.html" class="menu-link px-5">Account Settings</a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="<?php echo e(route('admin.auth.logout')); ?>" class="menu-link px-5">Sign Out</a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::User account menu-->
<?php /**PATH F:\web\library\resources\views/admin/includes/user.blade.php ENDPATH**/ ?>