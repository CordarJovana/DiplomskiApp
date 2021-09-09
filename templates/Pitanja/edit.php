<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pitanja $pitanja
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pitanja->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pitanja->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pitanja'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pitanja form content">
            <?= $this->Form->create($pitanja) ?>
            <fieldset>
                <legend><?= __('Edit Pitanja') ?></legend>
                <?php
                    echo $this->Form->control('pitanje');
                    echo $this->Form->control('tacanodgovor');
                    echo $this->Form->control('netacanodgovor');
                    echo $this->Form->control('koznaznaid');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
