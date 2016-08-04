<?php
// cargar un layout diferente
$this->layout='default';

?>
<?=$this->Form->create() ?>
<fieldset>
    <legend><?= __('Login') ?></legend>
    <?= $this->Form->input('username') ?>
    <?= $this->Form->input('password') ?>
    <?= $this->Form->submit(__('Login')) ?>
</fieldset>
<?= $this->Form->end() ?>
