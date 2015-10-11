<?php
/**
 * @var string $message
 * @var int $level
 */
switch ($level) {
    case \LWS\Framework\Notifications\Notification::LEVEL_SUCCESS:
        $class = "alert-success";
        break;
    case \LWS\Framework\Notifications\Notification::LEVEL_WARNING:
        $class = "alert-warning";
        break;
    case \LWS\Framework\Notifications\Notification::LEVEL_ERROR:
        $class = "alert-danger";
        break;
    default:
        $class = "alert-info";
        break;
}
?>
<div class="alert <?php echo $class?> alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $message?>
</div>