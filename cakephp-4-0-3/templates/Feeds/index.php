<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feed[]|\Cake\Collection\CollectionInterface $feeds
 */
?>
<div class="feeds index content">
    <?= $this->Html->link(__('New Feed'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Feeds') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('update_at') ?></th>
                    <th><?= $this->Paginator->sort('create_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feeds as $feed): ?>
                <tr>
                    <td><?= $this->Number->format($feed->id) ?></td>
                    <td><?= $feed->has('user') ? $this->Html->link($feed->user->id, ['controller' => 'Users', 'action' => 'view', $feed->user->id]) : '' ?></td>
                    <td><?= h($feed->update_at) ?></td>
                    <td><?= h($feed->create_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $feed->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $feed->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $feed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feed->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
