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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $feed->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $feed->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Feeds'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="feeds form content">
            <?= $this->Form->create($feed) ?>
            <fieldset>
                <legend><?= __('Edit Feed') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('image_file_name');
                    echo $this->Form->control('video_file_name');
                    echo $this->Form->control('message');
                    echo $this->Form->control('update_at', ['empty' => true]);
                    echo $this->Form->control('create_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
