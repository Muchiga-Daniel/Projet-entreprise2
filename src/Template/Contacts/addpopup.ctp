<?php
/**
  * @var \App\View\AppView $this
  */
?>

<!--<div class="modal blur-effect2" id="popup2">
    <div class="popup-content">
        <div>
            <div class="partenaires form large-12 medium-8 columns content act">
                <?= $this->Form->create($partenaire,['id' => 'dialogform']) ?>
                <fieldset>
                    <legend><?= __('Add Partenaire') ?></legend>
                    <?php
                        echo $this->Form->control('nom');
                        echo $this->Form->control('adresse');
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['id' => 'sumbitform']) ?>
                <?= $this->Form->end() ?>
            </div>
                     
        <div class="close"></div>
        </div>
    </div>
</div>-->

<?= $this->Form->create($contact,['id' => 'dialogform']) ?>
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
<?= $this->Form->button('Submit',['id' => 'sumbitform']); ?>
<?= $this->Form->end(); ?>

<script type="text/javascript">
    var myurl = '<?= $this->Url->build(); ?>';
    <?= file_get_contents("./js/popups.js"); ?>
</script>