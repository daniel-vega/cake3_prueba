<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Editors'), ['controller' => 'Editors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Editor'), ['controller' => 'Editors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($article->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Body') ?></th>
            <td><?= h($article->body) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Category') ?></th>
            <td><?= $this->Number->format($article->id_category) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Editors') ?></h4>
        <?php if (!empty($article->editors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->editors as $editors): ?>
            <tr>
                <td><?= h($editors->id) ?></td>
                <td><?= h($editors->nombre) ?></td>
                <td><?= h($editors->created) ?></td>
                <td><?= h($editors->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Editors', 'action' => 'view', $editors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Editors', 'action' => 'edit', $editors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Editors', 'action' => 'delete', $editors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $editors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
