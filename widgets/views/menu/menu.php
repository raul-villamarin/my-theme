<?php if($hasMenu): ?>
<ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
    <?php if(is_front_page()):?>
     <li class="menu-active"><a href="#">Home</a></li>
    <?php else:?>
      <li ><a href="<?=get_home_url()?>">Home</a></li>
    <?php endif;?>
    <?php $currentId = get_the_ID(); ?>
    <?php foreach($menuOptions as $menuEntry): ?>
        <?php if(!empty($currentId) && $currentId==$menuEntry['object_id']): ?>
        <li class="menu-active"><a data-id="<?=$menuEntry['object_id']?>" href="<?=$menuEntry['url']?>"><?=$menuEntry['title']?></a></li>
        <?php else:?>
        <li><a data-id="<?=$menuEntry['object_id']?>" href="<?=$menuEntry['url']?>"><?=$menuEntry['title']?></a></li>
        <?php endif;?>
    <?php endforeach;?>
        </ul>
<?php else: ?>
    <h1>Please select a menu for this widget</h1>
<?php endif; ?>