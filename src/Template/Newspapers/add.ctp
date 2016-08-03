<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Newspapers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="newspapers form large-9 medium-8 columns content">
    <?= $this->Form->create($newspaper, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Newspaper') ?></legend>
        <?php
            echo $this->Form->input('id_editors');
            echo $this->Form->input('id_categories');
            echo $this->Form->input('id_articles');
            echo $this->Form->file('uploadfile', ['multiple'=>true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
