<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feed $feed
 */
?>
    <?= $this->Form->create()//create a form for an entity ,the context for which the form is being defined,feedData is a entity?> 
    
    <legend><?= __('Chat') ?></legend>
     <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('message'); echo $this->Html->link('Logout', ['controller'=>'Feeds','action' => 'add'],['class'=>'button']);
                   // echo $this->Form->control('create_at');
    ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
<table>
<tr>
    <th>Name </th>
    <th>Message </th>
    <th>Created_Date </th>
    <th>Update_Date </th>
    <th> Actions </th>
</tr>
<?php foreach ($loadMess as $feed): ?>
<tr>
    <td><?= ($feed->name) ?></td>
    <td><?= ($feed->message) ?></td>
    <td><?= ($feed->create_at) ?></td>
    <td><?= ($feed->update_at) ?></td>

      <!--    <a href="view/8">Học HTML</a> -->
    <td > 
                        <?= $this->Html->link('Edit', ['action' => 'edit', $feed->id],['class' => 'button']) ?>
                        <?= $this->Form->postLink('Delete', ['action' => 'delete', $feed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feed->id)],['class' => 'button']) ?>
    </td>
    <br>
</tr>     
 <?php endforeach; ?>
 </table>    