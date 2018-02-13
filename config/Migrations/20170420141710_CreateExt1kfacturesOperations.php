<?php
use Migrations\AbstractMigration;

class CreateExt1kfacturesOperations extends AbstractMigration
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
        $table = $this->table('ext1kfacture_operations');
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('code_facture_1K', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('operation_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('statut_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addIndex([
            'operation_id',
        ], [
            'name' => 'BY_OPERATION_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'statut_id',
        ], [
            'name' => 'BY_STATUT_ID',
            'unique' => false,
        ]);
        $table->create();
    }
}
