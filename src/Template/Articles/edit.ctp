<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Editors'), ['controller' => 'Editors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Editor'), ['controller' => 'Editors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->input('id_category');
            echo $this->Form->input('title');
            echo $this->Form->input('body');
            echo $this->Form->input('editors._ids', ['options' => $editors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
