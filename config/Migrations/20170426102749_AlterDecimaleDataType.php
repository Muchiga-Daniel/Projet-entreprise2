<?php
use Migrations\AbstractMigration;

class AlterDecimaleDataType extends AbstractMigration
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
        $offre_initiales->changeColumn('cpm','decimal',['precision' => '10','scale' => '2'])->update();
        $offre_initiales->changeColumn('ht','decimal',['precision' => '10','scale' => '2'])->update();
        $offre_initiales->changeColumn('tva','decimal',['precision' => '10','scale' => '2'])->update();
        $offre_initiales->changeColumn('ttc','decimal',['precision' => '10','scale' => '2'])->update();
        
        $operations = $this->table('operations');
        $operations->changeColumn('cpm','decimal',['precision' => '10','scale' => '2'])->update();
        $operations->changeColumn('ht','decimal',['precision' => '10','scale' => '2'])->update();
        $operations->changeColumn('tva','decimal',['precision' => '10','scale' => '2'])->update();
        $operations->changeColumn('ttc','decimal',['precision' => '10','scale' => '2'])->update();
    }
}
