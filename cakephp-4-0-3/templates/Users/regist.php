<?= $this->Form->create($new) ?>
<legend><?= __('Regist User') ?></legend>
<?= $this->Form->control('name')?>
<?= $this->Form->control('email')?>
<?= $this->Form->control('password')?>
<?= $this->Form->button(__('Regist'))?>      <?= $this->Html->link(__('Login'),['controller'=>'Users','action'=>'login'],['class'=>'button']);?>
<?= $this->Form->end()?>
