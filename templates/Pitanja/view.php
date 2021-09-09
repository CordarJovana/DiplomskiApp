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
            <?= $this->Html->link(__('Edit Pitanja'), ['action' => 'edit', $pitanja->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pitanja'), ['action' => 'delete', $pitanja->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pitanja->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pitanja'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pitanja'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pitanja view content">
            <h3><?= h($pitanja->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tacanodgovor') ?></th>
                    <td><?= h($pitanja->tacanodgovor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Netacanodgovor') ?></th>
                    <td><?= h($pitanja->netacanodgovor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pitanja->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Koznaznaid') ?></th>
                    <td><?= $this->Number->format($pitanja->koznaznaid) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Pitanje') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pitanja->pitanje)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
