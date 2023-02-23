<?php if(0==count($options)):?>
	<a href="#">It needs defined menus</a>
<?php else: ?>
<select 
id="<?php echo esc_attr( $this->get_field_id( 'menu' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'menu' ) ); ?>">
	<option value="">--Select a Menu--</option>
	<?php foreach($options as $option):?>
    <?php if($menu==$option):?>
    <option value="<?=$option?>" selected=""><?=$option?></option>
    <?php else:?>
    <option value="<?=$option?>"><?=$option?></option>	
    <?php endif;?>
<?php endforeach; ?>
</select>
<?php endif; ?>