var width = <?php echo $width ?>;
var height = <?php echo $height ?>;
var top = <?php echo $top ?>;
var page = require('webpage').create();
page.viewportSize = {width: width, height: height};
<?php if (isset($userAgent)) : ?>
page.settings.userAgent = '<?php echo $userAgent ?>';
<?php endif ?>

<?php if (isset($clipOptions)) : ?>
page.clipRect = <?php echo json_encode($clipOptions) ?>;
<?php endif ?>

page.open('<?php echo $url ?>', function () {
    /* This will set the page background color white */
    <?php if (isset($backgroundColor)) : ?>
    page.evaluate(function() {
        document.body.bgColor = '<?php echo $backgroundColor ?>';
    });
    <?php endif ?>

    page.render('<?php echo $imageLocation ?>');
    phantom.exit();
});
