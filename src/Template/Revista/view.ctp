<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Revistum'), ['action' => 'edit', $revistum->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Revistum'), ['action' => 'delete', $revistum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revistum->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Revista'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Revistum'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="revista view large-9 medium-8 columns content">
    <h3><?= h($revistum->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($revistum->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Category') ?></th>
            <td><?= $this->Number->format($revistum->id_category) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Article') ?></th>
            <td><?= $this->Number->format($revistum->id_article) ?></td>
        </tr>
    </table>
</div>
