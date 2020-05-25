<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feed $feed
 */
?>
<?= $this->Form->create($feedData,['type'=>'file'])?> 
<legend><?= __('Chat') ?></legend>
<?php
        echo $this->Form->control('name',['default'=>$username]);
        echo $this->Form->control('message');
        echo $this->Form->control('filename',['type'=>'file']);                
?>
    <?= $this->Form->button(__('Send')) ?>     <?= $this->Html->link('Logout', ['controller'=>'Users','action' => 'logout'],['class' => 'button']) ?>
    <?= $this->Form->end() ?>
<table>
<tr>
    <th>Name</th>
    <th>Message</th>
    <th>Media</th>
    <th>Created_Date</th>
    <th>Update_Date</th>
    <th>Actions</th>
</tr>
<?php foreach ($loadMsg as $feed): ?>
<tr>
    <td><?= ($feed->name) ?></td>
    <td><?= ($feed->message) ?></td>
   <td> <?php 
   if(strpos($feed->filename,'mp4') !== false){
         echo $this->Html->media($feed->filename,['fullBase' => true,'width' => 500,'height'=> 300]); 
        }
    else
        echo @$this->Html->image($feed->filename,['width' => 500,'height'=> 300]) ;
   ?>
   </td>
    <td><?= ($feed->create_at) ?></td>
    <td><?= ($feed->update_at) ?></td>
    <td > 
        <?= $this->Html->link('Edit', ['action' => 'edit', $feed->id],['class' => 'button']) ?>
        <?= $this->Form->postLink('Delete', ['action' => 'delete', $feed->id], ['class'=>'button'],['confirm' => __('Are you sure you want to delete # {0}?', $feed->id)]) ?>
    </td>
</tr>     
 <?php endforeach; ?>
 </table>  