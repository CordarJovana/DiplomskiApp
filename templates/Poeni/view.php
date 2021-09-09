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
            <?= $this->Html->link(__('Edit Poeni'), ['action' => 'edit', $poeni->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Poeni'), ['action' => 'delete', $poeni->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poeni->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Poeni'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Poeni'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="poeni view content">
            <h3><?= h($poeni->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($poeni->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Userid') ?></th>
                    <td><?= $this->Number->format($poeni->userid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Koznaznaid') ?></th>
                    <td><?= $this->Number->format($poeni->koznaznaid) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
