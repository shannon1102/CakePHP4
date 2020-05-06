<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feed $feed
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Feed'), ['action' => 'edit', $feed->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Feed'), ['action' => 'delete', $feed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feed->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Feeds'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Feed'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="feeds view content">
            <h3><?= h($feed->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $feed->has('user') ? $this->Html->link($feed->user->id, ['controller' => 'Users', 'action' => 'view', $feed->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($feed->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update At') ?></th>
                    <td><?= h($feed->update_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create At') ?></th>
                    <td><?= h($feed->create_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($feed->name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Image File Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($feed->image_file_name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Video File Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($feed->video_file_name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($feed->message)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
