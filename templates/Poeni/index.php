<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Poeni[]|\Cake\Collection\CollectionInterface $poeni
 */
?>
<div class="poeni index content">
    <?= $this->Html->link(__('New Poeni'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Poeni') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('userid') ?></th>
                    <th><?= $this->Paginator->sort('koznaznaid') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($poeni as $poeni): ?>
                <tr>
                    <td><?= $this->Number->format($poeni->id) ?></td>
                    <td><?= $this->Number->format($poeni->userid) ?></td>
                    <td><?= $this->Number->format($poeni->koznaznaid) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $poeni->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $poeni->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $poeni->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poeni->id)]) ?>
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
