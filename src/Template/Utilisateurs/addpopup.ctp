<?php
/**
  * @var \App\View\AppView $this
  */
?>


<?= $this->Form->create($utilisateur,['id' => 'dialogform']) ?>
    <fieldset>
        <legend><?= __('Add Utilisateur') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('mobile');
            echo $this->Form->control('utilisateur_type_id', ['options' => $utilisateurTypes]);
        ?>
    </fieldset>
<?= $this->Form->button('Submit',['id' => 'sumbitform']); ?>
<?= $this->Form->end(); ?>

<script type="text/javascript">
    var myurl = '<?= $this->Url->build(); ?>';
    <?= file_get_contents("./js/popups.js"); ?>
</script>