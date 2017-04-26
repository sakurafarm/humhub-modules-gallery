<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 * 
 * @package humhub.modules.gallery.views
 * @since 1.0
 * @author Sebastian Stumpf
 */
?>

<?php

use \humhub\modules\gallery\assets\Assets;

$bundle = Assets::register($this);
$counter = 0;
$rowClosed = true;
?>

<div id="gallery-list" class="col-sm-12">
    <?php foreach ($entryList as $entry): ?>
        <?php
        if ($counter % 3 === 0) :
            echo '<div class="row">';
            $rowClosed = false;
        endif;
        echo \humhub\modules\gallery\widgets\GalleryListEntry::widget(['entryObject' => $entry, 'parentGallery' => $parentGallery]);
        if (++$counter % 3 === 0) :
            echo '</div>';
            $rowClosed = true;
        endif;
        ?>
    <?php endforeach; ?>
    <?php echo $rowClosed ? "" : '</div>'; ?>

    <?php if (!$entryList): ?>
        <?= $htmlContentEmpty ?>
    <?php endif; ?>
</div>