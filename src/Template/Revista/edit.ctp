<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $revistum->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $revistum->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Revista'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="revista form large-9 medium-8 columns content">
    <?= $this->Form->create($revistum) ?>
    <fieldset>
        <legend><?= __('Edit Revistum') ?></legend>
        <?php
            echo $this->Form->input('id_category');
            echo $this->Form->input('id_article');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
