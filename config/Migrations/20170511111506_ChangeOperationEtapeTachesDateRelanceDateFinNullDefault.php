<?php
use Migrations\AbstractMigration;

class ChangeOperationEtapeTachesDateRelanceDateFinNullDefault extends AbstractMigration
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
        $operation_etape_taches = $this->table('operation_etape_taches');
        $operation_etape_taches->changeColumn('date_relance', 'datetime', ['default' => null,'null' => true,])->update();
        $operation_etape_taches->changeColumn('date_fin', 'datetime', ['default' => null,'null' => true,])->update();
    }
}
