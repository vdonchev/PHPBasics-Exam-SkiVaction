<?php $infoMessages = $this->getSession()->getMessages(0); ?>
<?php $errorMessages = $this->getSession()->getMessages(1); ?>
<?php foreach ($errorMessages as $error) : ; ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> <?= $error; ?>
    </div>
<?php endforeach; ?>
<?php foreach ($infoMessages as $info) : ; ?>
    <div class="alert alert-dismissible alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Info</strong> <?= $info; ?>
    </div>
<?php endforeach; ?>