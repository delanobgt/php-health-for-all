<?php
    require_once __DIR__.'/../lib/session.php';
?>
<div class="container alert-container">
    <br/>
    <?php foreach(array('danger', 'success', 'info') as $errorType): ?>
        <?php foreach (getFlash($errorType) as $error): ?>
        <div class="alert alert-<?php echo $errorType; ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <br/>
</div>
