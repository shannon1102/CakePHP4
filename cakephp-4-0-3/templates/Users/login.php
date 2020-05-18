<?= $this->Form->create() ?>
<legend><?= __('Login') ?></legend>
<?= $this->Form->control('email')?>
<?= $this->Form->control('password')?>
<?= $this->Form->button(__('Login'))?>      <?= $this->Html->link(__('New Account'), ['controller'=>'Users','action' => 'regist'], ['class' => 'button']) ?>
<?= $this->Form->end()?>
