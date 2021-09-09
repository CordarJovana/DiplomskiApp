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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $koznazna->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $koznazna->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Koznazna'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="koznazna form content">
            <?= $this->Form->create($koznazna) ?>
            <fieldset>
                <legend><?= __('Edit Koznazna') ?></legend>
                <?php
                    echo $this->Form->control('naziv');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
