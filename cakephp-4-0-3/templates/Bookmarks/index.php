<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark[]|\Cake\Collection\CollectionInterface $bookmarks
 */
?>
<div class="bookmarks index content">
    <?= $this->Html->link(__('New Bookmark'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bookmarks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookmarks as $bookmark): ?>
                <tr>
                    <td><?= $this->Number->format($bookmark->id) ?></td>
                    <td><?= $bookmark->has('user') ? $this->Html->link($bookmark->user->id, ['controller' => 'Users', 'action' => 'view', $bookmark->user->id]) : '' ?></td>
                    <td><?= h($bookmark->title) ?></td>
                    <td><?= h($bookmark->created) ?></td>
                    <td><?= h($bookmark->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bookmark->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookmark->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookmark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmark->id)]) ?>
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
