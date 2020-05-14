<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feed $feed
 */
?>
    <?= $this->Form->create($feed) ?>
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
<th>Name            </th>
&nbsp;
<th>Message         </th>
&nbsp;
<th>Date            </th>
<br>
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