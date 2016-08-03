<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Newspaper'), ['action' => 'edit', $newspaper->id_newspapers]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Newspaper'), ['action' => 'delete', $newspaper->id_newspapers], ['confirm' => __('Are you sure you want to delete # {0}?', $newspaper->id_newspapers)]) ?> </li>
        <li><?= $this->Html->link(__('List Newspapers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Newspaper'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newspapers view large-9 medium-8 columns content">
    <h3><?= h($newspaper->id_newspapers) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id Newspapers') ?></th>
            <td><?= $this->Number->format($newspaper->id_newspapers) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Editors') ?></th>
            <td><?= $this->Number->format($newspaper->id_editors) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Categories') ?></th>
            <td><?= $this->Number->format($newspaper->id_categories) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Articles') ?></th>
            <td><?= $this->Number->format($newspaper->id_articles) ?></td>
        </tr>
    </table>
</div>
