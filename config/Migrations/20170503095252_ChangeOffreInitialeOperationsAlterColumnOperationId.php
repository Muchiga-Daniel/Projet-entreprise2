<?php
use Migrations\AbstractMigration;

class ChangeOffreInitialeOperationsAlterColumnOperationId extends AbstractMigration
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
        $OffreInitialeOperations = $this->table('offre_initiale_operations');
        $OffreInitialeOperations->renameColumn('operation','operation_id')->update();
        $OffreInitialeOperations->changeColumn('operation_id', 'integer', ['default' => null,'limit' => 11,'null' => false,])->update();
        $OffreInitialeOperations->addIndex([
            'operation_id',
        ], [
            'name' => 'BY_OPERATION_ID',
            'unique' => false,
        ])->update();
    }
}
