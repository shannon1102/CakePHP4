<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feed $feed
 */

use Cake\Chronos\Date;

?>       
 <?= $this->Html->link(__('List Feeds'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
 
 <?= $this->Form->create($feed) ?>
<fieldset>
<legend><?= __('Edit Message') ?></legend>
 <?php      
                    echo $this->Form->control('name');
                    echo $this->Form->control('message');
                
 ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        