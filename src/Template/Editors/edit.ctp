<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $editor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $editor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Editors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="editors form large-9 medium-8 columns content">
    <?= $this->Form->create($editor) ?>
    <fieldset>
        <legend><?= __('Edit Editor') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('articles._ids', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
