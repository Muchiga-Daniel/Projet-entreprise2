<?php
use Migrations\AbstractMigration;

class CreateOffresInitialesOperations extends AbstractMigration
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
        $table = $this->table('offre_initiale_operations');
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('offre_initiale_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('operation', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addIndex([
            'offre_initiale_id',
        ], [
            'name' => 'BY_OFFRE_INITIALE_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'operation',
        ], [
            'name' => 'index',
            'unique' => false,
        ]);
        $table->create();
    }
}
