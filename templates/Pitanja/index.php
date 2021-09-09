<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pitanja[]|\Cake\Collection\CollectionInterface $pitanja
 */
?>
<div class="pitanja index content">
    <?= $this->Html->link(__('New Pitanja'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pitanja') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tacanodgovor') ?></th>
                    <th><?= $this->Paginator->sort('netacanodgovor') ?></th>
                    <th><?= $this->Paginator->sort('koznaznaid') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pitanja as $pitanja): ?>
                <tr>
                    <td><?= $this->Number->format($pitanja->id) ?></td>
                    <td><?= h($pitanja->tacanodgovor) ?></td>
                    <td><?= h($pitanja->netacanodgovor) ?></td>
                    <td><?= $this->Number->format($pitanja->koznaznaid) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pitanja->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pitanja->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pitanja->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pitanja->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
