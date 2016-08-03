<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Newspaper'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newspapers index large-9 medium-8 columns content">
    <h3><?= __('Newspapers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id_newspapers') ?></th>
                <th><?= $this->Paginator->sort('id_editors') ?></th>
                <th><?= $this->Paginator->sort('id_categories') ?></th>
                <th><?= $this->Paginator->sort('id_articles') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newspapers as $newspaper): ?>
            <tr>
                <td><?= $this->Number->format($newspaper->id_newspapers) ?></td>
                <td><?= $this->Number->format($newspaper->id_editors) ?></td>
                <td><?= $this->Number->format($newspaper->id_categories) ?></td>
                <td><?= $this->Number->format($newspaper->id_articles) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newspaper->id_newspapers]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newspaper->id_newspapers]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newspaper->id_newspapers], ['confirm' => __('Are you sure you want to delete # {0}?', $newspaper->id_newspapers)]) ?>
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
