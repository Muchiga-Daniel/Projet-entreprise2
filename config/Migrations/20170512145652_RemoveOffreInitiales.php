<?php
use Migrations\AbstractMigration;

class RemoveOffreInitiales extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $offre_initiales = $this->table('offre_initiales');
        $offre_initiales->removeColumn('routeur_id')->save();
        $offre_initiales->removeColumn('routage')->save();
    }
}
