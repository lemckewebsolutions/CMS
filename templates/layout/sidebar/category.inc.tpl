<?php
/**
 * @var string $categoryName
 * @var LWS\CMS\SideBar\Item[] $items
 */
?>
<li class="nav-header"><?php echo $categoryName?></li>
<?php
foreach ($items as $item) {
    $class = "";

    if ($item->isSelected() === true) {
        $class = "class=\"active\" ";
    }
?>
<li>
    <a <?php echo $class?>href="<?php echo $item->getUrl()?>" title="<?php echo $item->getName()?>">
        <?php echo $item->getName()?>
    </a>
</li>
<?php
}
?>
