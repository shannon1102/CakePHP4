<table>
<tr>
    <th>Name </th>
    <th>Message </th>
    <th>Created_Date </th>
    <th>Update_Date </th>
    <th> Actions </th>
</tr>
<?php foreach ($van as $feed): ?>
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