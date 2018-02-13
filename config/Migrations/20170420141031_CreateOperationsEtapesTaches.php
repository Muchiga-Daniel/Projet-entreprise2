<?php
use Migrations\AbstractMigration;

class CreateOperationsEtapesTaches extends AbstractMigration
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
        $table = $this->table('operation_etape_taches');
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('date_relance', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('date_fin', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('remarque', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('utilisateur_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('operation_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('etape_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('tache_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addIndex([
            'utilisateur_id',
        ], [
            'name' => 'BY_UTILISATEUR_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'operation_id',
        ], [
            'name' => 'BY_OPERATION_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'etape_id',
        ], [
            'name' => 'BY_ETAPE_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'tache_id',
        ], [
            'name' => 'BY_TACHE_ID',
            'unique' => false,
        ]);
        $table->create();
    }
}
