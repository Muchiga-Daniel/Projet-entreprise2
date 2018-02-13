<?php
use Migrations\AbstractMigration;

class AddTableInOperations extends AbstractMigration
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
        $table = $this->table('operations');
        $table->addColumn('full_potentiel', 'string', [
            'default' => 'Non',
            'limit' => 255,
            'null' => false,
            'after' => 'ttc'
        ])
        ->update();
        $table->addColumn('date_oi_signe', 'datetime', [
            'default' => null,
            'null' => true,
            'after' => 'full_potentiel'
        ])
        ->update();
    }
}
