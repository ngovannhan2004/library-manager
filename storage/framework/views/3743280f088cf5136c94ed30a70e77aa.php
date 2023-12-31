<!--begin::Javascript-->
<script>var hostUrl = "<?php echo e(asset('/admin/assets/')); ?>";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="<?php echo e(asset('/admin/assets/plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('/admin/assets/js/scripts.bundle.js')); ?>"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used by this pages)-->
<script src="<?php echo e(asset('/admin/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used by this pages)-->
<script src="<?php echo e(asset('/admin/assets/js/custom/apps/ecommerce/settings/settings.js')); ?>"></script>
<script src="<?php echo e(asset('/admin/assets/js/widgets.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('/admin/assets/js/custom/widgets.js')); ?>"></script>
<script src="<?php echo e(asset('/admin/assets/js/custom/apps/chat/chat.js')); ?>"></script>
<script src="<?php echo e(asset('/admin/assets/js/custom/utilities/modals/upgrade-plan.js')); ?>"></script>
<script src="<?php echo e(asset('/admin/assets/js/custom/utilities/modals/create-app.js')); ?>"></script>
<script src="<?php echo e(asset('/admin/assets/js/custom/utilities/modals/users-search.js')); ?>"></script>
<?php echo $__env->yieldContent('js_custom'); ?>
<!--end::Custom Javascript-->
<!--end::Javascript-->
<?php /**PATH F:\web\library\resources\views/admin/includes/scripts.blade.php ENDPATH**/ ?>