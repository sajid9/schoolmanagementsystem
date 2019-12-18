<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <?php echo $__env->yieldContent('header'); ?>
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php echo $__env->yieldContent('sidebar'); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo $__env->yieldContent('title'); ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                   <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <?php echo $__env->yieldContent('footer'); ?>
        
    </body>
</html>
