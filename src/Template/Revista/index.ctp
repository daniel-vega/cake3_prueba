<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Revistum'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="revista index large-9 medium-8 columns content">
    <h3><?= __('Revista') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('id_category') ?></th>
                <th><?= $this->Paginator->sort('id_article') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($revista as $revistum): ?>
            <tr>
                <td><?= $this->Number->format($revistum->id) ?></td>
                <td><?= $this->Number->format($revistum->id_category) ?></td>
                <td><?= $this->Number->format($revistum->id_article) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $revistum->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $revistum->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $revistum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revistum->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
