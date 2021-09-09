<?php $this->Html->css('style', ['block'=>true]);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body id="ivonaPozadina">
  <div class="wrapper">
<div class="users form">
<?= $this->Html->link("Add User", ['action' => 'add'],array('class' => 'button', 'id'=>'reg')) ?>
<div class="login-form">
    <?= $this->Flash->render() ?>
   <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
       <!-- <legend><?= __('Please enter your username and password') ?></legend>-->
        <?= $this->Form->control('username', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>
    </div>
     </div>
     </div>
     <div class="buttonBack">
        <a href="/myappdugme" class="button" id="povratak"> POVRATAK NA POČETNU </a>
    </div>
</body>