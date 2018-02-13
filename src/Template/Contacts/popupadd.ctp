<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="modal blur-effect" id="popup">
    <div class="popup-content">
        <div>
        <div class="contacts form large-12 medium-8 columns content act" id="contactAddForm">
            <?= $this->Form->create($contact) ?>
            <fieldset>
                <legend><?= __('Add Contact') ?></legend>
                <?php
                    echo $this->Form->control('nom');
                    echo $this->Form->control('email');
                    echo $this->Form->control('mobile');
                    echo $this->Form->control('fixe');
                    echo $this->Form->control('commentaire');
                    echo $this->Form->control('partenaire_id', ['options' => $partenaires]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit', 'util')) ?>
            <?= $this->Form->end() ?>
        </div>
                     
        <div class="close"></div>
        </div>
    </div>
</div>
