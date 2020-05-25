<?php
use Cake\Chronos\Date;
?>       
 <?= $this->Html->link(__('List Feeds'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
 <?= $this->Form->create($feed,['type'=>'file']) ?>
<fieldset>
<legend><?= __('Edit Message',) ?></legend>
 <?php      
      echo $this->Form->control('name');
      echo $this->Form->control('message');
      echo $this->Form->control('change_file',['type'=>'file']);               
 ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
        