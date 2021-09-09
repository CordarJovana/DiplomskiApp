<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Poeni $poeni
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $poeni->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $poeni->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Poeni'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="poeni form content">
            <?= $this->Form->create($poeni) ?>
            <fieldset>
                <legend><?= __('Edit Poeni') ?></legend>
                <?php
                    echo $this->Form->control('userid');
                    echo $this->Form->control('koznaznaid');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
