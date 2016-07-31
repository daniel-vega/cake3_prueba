<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Revista'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="revista form large-9 medium-8 columns content">
    <?= $this->Form->create($revistum) ?>
    <fieldset>
        <legend><?= __('Add Revistum') ?></legend>
        <?php
        //echo $this->Form->input('id_category', ['options' => $articles]);
        echo $this->Form->input('id_category',array(
          'options'=>$category,
          'class'=>'form-control',
          'empty'=> '--'
        ));
            echo $this->Form->input('id_article',array(
              'options'=>$articles,
              'class'=>'form-control',
              'empty'=> '--'
            ));
            echo $this->Form->input('title');
            echo $this->Form->input('body');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
