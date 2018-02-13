<?php
use Migrations\AbstractMigration;

class AlterOperationsVolumecommercialVolumefactureRemise extends AbstractMigration
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
        $operations = $this->table('operations');
        $operations->renameColumn('volume','volume_commande');
        $operations->addColumn('volume_facture', 'decimal', ['precision' => '10','scale' => '2','after' => 'volume_commande'])->update();
        $operations->addColumn('remise', 'decimal', ['precision' => '10','scale' => '4','after' => 'cpm'])->update();
    }
}
