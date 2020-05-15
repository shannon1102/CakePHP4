<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feed $feed
 */
?>
     <!-- in order to take advantage of the FormHelper -->  
    <?= $this->Form->create($feedData)//create a form for an entity ,the context for which the form is being defined,feedData is a entity?> 
    
    <legend><?= __('Chat') ?></legend>
     <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('message');
                    echo $this->Form->control('create_at');
    ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
<table>
<tr>
    <th>Name </th>
    <th>Message </th>
    <th>Date </th>
</tr>
<?php foreach ($loadMess as $feed): ?>
<tr>
    <td><?= ($feed->name) ?></td>
    <td><?= ($feed->message) ?></td>
    <td><?= ($feed->create_at) ?></td>
    <br>
</tr>     
 <?php endforeach; ?>
 </table>    