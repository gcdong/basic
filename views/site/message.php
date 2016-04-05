<?php

use yii\helpers\Html;
use app\core\CMS;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $title;
?>
<div id="da-error-wrapper">
    <h1 class="da-error-heading"><?= $message ?></h1>
    <p><a href="<?php echo CMS::getApp()->request->getReferrer()?>">返回上一页</a></p>
</div>

