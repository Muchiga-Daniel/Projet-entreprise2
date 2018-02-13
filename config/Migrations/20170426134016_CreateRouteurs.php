<?php
use Migrations\AbstractMigration;

class CreateRouteurs extends AbstractMigration
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
        //routeurs
        $routeurs = $this->table('routeurs');
        $routeurs->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $routeurs->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $routeurs->addColumn('designation', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $routeurs->create();

        //operations
        $operations = $this->table('operations');
        $operations->addColumn('routeur_id','integer',[
            'after' => 'routage',
            'default' => null,
            'limit' => 11,
            'null' => false,
            ]);
        $operations->addIndex([
            'routeur_id',
        ], [
            'name' => 'BY_ROUTEUR_ID',
            'unique' => false,
        ]);
        $operations->save();

        //offre_initiales
        $offre_initiales = $this->table('offre_initiales');
        $offre_initiales->addColumn('routeur_id','integer',[
            'after' => 'routage',
            'default' => null,
            'limit' => 11,
            'null' => false,
            ]);
        $offre_initiales->addIndex([
            'routeur_id',
        ], [
            'name' => 'BY_ROUTEUR_ID',
            'unique' => false,
        ]);
        $offre_initiales->save();

    }
}
