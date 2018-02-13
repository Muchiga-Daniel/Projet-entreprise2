<?php
use Migrations\AbstractMigration;

class AlterOffreInitialesRemise extends AbstractMigration
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
        $offre_initiales->addColumn('remise', 'decimal', ['precision' => '10','scale' => '4','after' => 'cpm'])->update();
    }
}
