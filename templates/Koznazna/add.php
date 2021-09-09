<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Koznazna $koznazna
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Koznazna'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="koznazna form content">
            <?= $this->Form->create($koznazna) ?>
            <fieldset>
                <legend><?= __('Add Koznazna') ?></legend>
                <?php
                    echo $this->Form->control('naziv');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
