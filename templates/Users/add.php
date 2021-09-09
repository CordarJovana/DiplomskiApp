<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php $this->Html->css('style', ['block'=>true]);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registracija</title>
</head>
<body id="ivonaPozadina">
<div class="row">
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Registracija') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Registruj se')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<div class="buttonBack">
        <a href="/myapp" class="button" id="povratak"> POVRATAK NA POČETNU </a>
    </div>
</body>


