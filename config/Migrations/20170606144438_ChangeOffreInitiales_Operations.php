<?php
use Migrations\AbstractMigration;

class ChangeOffreInitialesOperations extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {   
        $offre_initiales = $this->table('offre_initiales');
        $offre_initiales->changeColumn('volume_commande', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $offre_initiales->changeColumn('volume_facture', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $offre_initiales->changeColumn('cpm', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $offre_initiales->changeColumn('remise', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $offre_initiales->changeColumn('ht', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $offre_initiales->changeColumn('tva', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $offre_initiales->changeColumn('ttc', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $offre_initiales->changeColumn('nb_thematique', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();



        $operations = $this->table('operations');
        $operations->changeColumn('volume_commande', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $operations->changeColumn('volume_facture', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $operations->changeColumn('cpm', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $operations->changeColumn('remise', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $operations->changeColumn('ht', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $operations->changeColumn('tva', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update(); 
        $operations->changeColumn('ttc', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
        $operations->changeColumn('nb_thematique', 'decimal', ['precision' => '10','scale' => '4','default' => 0])->update();
    } 
}
