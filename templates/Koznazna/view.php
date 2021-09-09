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
            <?= $this->Html->link(__('Edit Koznazna'), ['action' => 'edit', $koznazna->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Koznazna'), ['action' => 'delete', $koznazna->id], ['confirm' => __('Are you sure you want to delete # {0}?', $koznazna->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Koznazna'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Koznazna'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="koznazna view content">
            <h3><?= h($koznazna->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Naziv') ?></th>
                    <td><?= h($koznazna->naziv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($koznazna->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
