<?php
/**
 * @var string $categoryName
 * @var LWS\CMS\SideBar\Item[] $items
 */
?>
<ul class="nav nav-sidebar">
<?php
foreach ($items as $item) {
    $class = "";

    if ($item->isSelected() === true) {
        $class = "class=\"active\" ";
    }
?>
    <li <?php echo $class?>>
        <a href="<?php echo $item->getUrl()?>" title="<?php echo $item->getName()?>">
            <?php echo $item->getName()?>
        </a>
    </li>
<?php
}
?>
</ul>
