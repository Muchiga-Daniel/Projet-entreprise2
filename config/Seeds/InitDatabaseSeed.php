<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Utilisateurs seed.
 */
class InitDataBaseSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        
        ////////////////////////////////////////////////////////////////////////////////////////////////
        //vidage table
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $this->execute('SET FOREIGN_KEY_CHECKS = 0');
        $this->execute('TRUNCATE TABLE operation_etape_taches');
        $this->execute('TRUNCATE TABLE offre_initiale_operations');
        $this->execute('TRUNCATE TABLE ext1kfacture_operations');
        $this->execute('TRUNCATE TABLE operation_types');
        $this->execute('TRUNCATE TABLE taches');
        $this->execute('TRUNCATE TABLE etapes');
        $this->execute('TRUNCATE TABLE contacts');
        $this->execute('TRUNCATE TABLE demandes');
        $this->execute('TRUNCATE TABLE offre_initiales');
        $this->execute('TRUNCATE TABLE operations');
        $this->execute('TRUNCATE TABLE partenaires');
        $this->execute('TRUNCATE TABLE statuts');
        $this->execute('TRUNCATE TABLE utilisateur_types');
        $this->execute('TRUNCATE TABLE utilisateurs');
        $this->execute('TRUNCATE TABLE routeurs');
        $this->execute('TRUNCATE TABLE partenaires');
        $this->execute('TRUNCATE TABLE contacts');
        $this->execute('SET FOREIGN_KEY_CHECKS = 1');

        ////////////////////////////////////////////////////////////////////////////////////////////////
        //Initialiser la base de données
        ////////////////////////////////////////////////////////////////////////////////////////////////
        //Etapes
        $Etapes = $this->table('etapes');
        $data = [
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Comptage'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'OI'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'BAT'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Routage'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Livraison'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Facturation'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Vérification'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Annulation'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Terminée'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Reportée'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Statistiques']
        ];
        $Etapes->insert($data)->save();

        //taches
        $taches = $this->table('taches');
        $data = [
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Comptage à faire','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 1],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Attente informations comptage','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 1],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Comptage envoyé','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 1],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'OI à faire','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 2],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Attente informations OI','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 2],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'OI envoyé','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 2],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'OI signé','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 2],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Bon pour accord sans OI','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 2],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'BAT à faire','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 3],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Attente informations BAT','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 3],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'BAT envoyé','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 3],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'BAT programmé','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 3],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'BAT validé','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 3],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Routage à programmer','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 4],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Attente informations Routage','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 4],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Routage planifié','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 4],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Routage effectué','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 4],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Livraison à envoyer','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 5],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Attente informations Livraison','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 5],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Livraison effectuée','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 5],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Facture à faire','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 6],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Facture envoyée','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 6],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Facture réglée','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 6],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Facture Offerte','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 6],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Attente information facturation','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 6],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Piège reçu','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 7],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Annulée','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 8],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Terminée','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 9],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Opération reportée','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 10],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Stat à faire','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 11],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Stat envoyées','delai_jour' => 0,'delai_heure' => 0,'delai_minute' => 0,'fin_mois' => 0,'etape_id' => 11]
        ];
        $taches->insert($data)->save();

        //Statuts
        $Statuts = $this->table('statuts');
        $data = [
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Actif'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Inactif']
        ];
        $Statuts->insert($data)->save();        

        //Operation_Types
        $Operation_Types = $this->table('operation_types');
        $data = [
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Location SMS'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Location Email'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Appending'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Sms Retargeting'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Monétisation email'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Cookie Retargeting'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Affiliation']
        ];
        $Operation_Types->insert($data)->save();

        //Utilisateur_Types
        $Utilisateur_Types = $this->table('utilisateur_types');
        $data = [
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Admin'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Compta'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Commerce'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Production'],
        ];
        $Utilisateur_Types->insert($data)->save();

        //Utilisateurs
        $Utilisateurs = $this->table('utilisateurs');
        $data = [
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Filipe Vila Verde','email' => 'filipe.vilaverde@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('FVV32aps94I'),'mobile' => '0663668193','utilisateur_type_id' => '1'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Daniel Muchiga','email' => 'daniel.muchiga@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Dmuchiga'),'mobile' => '','utilisateur_type_id' => '1'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Jean-Michel Jobert','email' => 'jean-michel.jobert@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('aseretjmj'),'mobile' => '','utilisateur_type_id' => '1'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Nicolas Armagnac','email' => 'nicolas.armagnac@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Narmagnac'),'mobile' => '','utilisateur_type_id' => '1'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Boris Berdah','email' => 'boris.berdah@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('benefice'),'mobile' => '','utilisateur_type_id' => '1'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Blaise Berdah','email' => 'blaise.berdah@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Bberdah'),'mobile' => '','utilisateur_type_id' => '1'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Flavien Charles','email' => 'flavien.charles@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Montpellier'),'mobile' => '','utilisateur_type_id' => '1'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Brice Laquerbe','email' => 'brice.laquerbe@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Blaquerbe'),'mobile' => '','utilisateur_type_id' => '1'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Michael HADDAD','email' => 'service.comptable@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Scomptable'),'mobile' => '','utilisateur_type_id' => '2'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Younes Khouakhi','email' => 'younes.khouakhi@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Ykhouakhi'),'mobile' => '','utilisateur_type_id' => '3'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Simon Vagnier','email' => 'simon.vagnier@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Svagnier'),'mobile' => '','utilisateur_type_id' => '3'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Antoine Pinault','email' => 'antoine.pinault@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Apinault'),'mobile' => '','utilisateur_type_id' => '3'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Etienne Dubujet','email' => 'etienne.dubujet@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Edubujet'),'mobile' => '','utilisateur_type_id' => '3'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Savanna Sinbandhit','email' => 'savanna.sinbandhit@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Ssinbandhit'),'mobile' => '','utilisateur_type_id' => '4'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Rodolph Leblanc','email' => 'rodolph.leblanc@wellpack.fr','password' => (new DefaultPasswordHasher)->hash('Rleblanc'),'mobile' => '','utilisateur_type_id' => '4'],
        ];
        $Utilisateurs->insert($data)->save();

        //Routeurs
        $routeurs = $this->table('routeurs');
        $data = [
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Indéfini'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Spot Hit'],
            ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'designation' => 'Sms Envoi'],
        ];
        $routeurs->insert($data)->save();

        //partenaires
        $partenaires = $this->table('partenaires');
        $data = [
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'NC','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => '3WREGIE','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => '40° SUR LA BANQUISE','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'AUDIKA','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'BNCTECH','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'BOCONCEPT','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'CAPELLI','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'CLIC ET SITE','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'COMPARADISE','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'COSPIRIT MEDIATRACK','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'CRITERE DIRECT','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'DARWIN','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'DIGITAL COYOTE','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'DIGITALKS','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'DOWIN','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'EDICTALYS','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'GEMY','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'GROUPE MOVING','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'GROUPE PAYROT','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'GROUPE TUPPIN','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'IDEE GAZON ZI','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'INFLUENS','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'KOMPASS','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'KWANKO','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'L\'ARGUS','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'M TARGET','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MARIONNAUD','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MARKET ESPACE','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MEDIAPOST','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MOBILE PRO','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MTARGET','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MY ELEFANT','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'PEUGEOT GEMY','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'PUBLICIS ETO','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'SCHMIDT','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'SMS CONSEIL','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'SMS ENVOI','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'SMS FACTOR','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'SPOT HIT','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'TOUAREGS','adresse' => ''],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'VIVIALYS','adresse' => ''],
        ];
        $partenaires->insert($data)->save();

        //contacts
        $contacts = $this->table('contacts');
        $data = [
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'ALEXIS DAUGE','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 2],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'ARNAUD GAUTHIER','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 2],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'ENORA SUREL','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 2],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MARC','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 2],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'SARAH','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 2],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'THIBAULT','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 2],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'JEAN LUC','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 3],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MARINE','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 4],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'ANNE BRACHET','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 5],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'SIMON DEBACKER','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 5],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'STEPHANIE','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 5],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'BENOIT GUITTARD','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 6],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'FOLL','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 6],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'LINSTRUMELLE','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 6],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'PASCAL LEMPEREUR','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 6],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'ROMAIN DEBUCHY','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 6],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'VALERIE FOREST','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 6],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'YOANN VALETTE','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 7],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'REGIS','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 8],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'BASTIEN DURY','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 9],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'DAMIEN','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 10],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MAJIDA EL BOUHALI','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 10],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'KAMEL','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 11],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'NICOLAS ROSTAN','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 12],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'ALEXANDRE SARAGOSTI','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 13],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'FRANCK DOUCET','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 14],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'ALEXANDRE SARAGOSTI','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 15],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'GAD','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 15],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'JULIE','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 16],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Karl-Eric KEO','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 17],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'GILLES','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 18],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'STEPHANE GRIGUER','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 18],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'VALERIE / DJALLAL','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 18],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'VALERIE koely','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 18],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'ALEXANDRA','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 19],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'AMAURY','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 19],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'HERMAN','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 19],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'PAULINE GIBON','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 19],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'PAULINE/HERMAN','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 19],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MATHIEU','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 20],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'MATTHIEU','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 20],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Renaud','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 21],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'SANDRA','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 22],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Geoffrey Depienne','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 23],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'SIHAM','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 24],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'STEPHANIE SHEIDECKER','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 24],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Fabien SANZ','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 25],
                    ['created' => date('Y-m-d H:i:s'),'modified' => date('Y-m-d H:i:s'),'nom' => 'Sarah Mizrahi','email' => '','mobile' => '','fixe' => '','commentaire' => '','partenaire_id' => 25],
        ];
        $contacts->insert($data)->save();

    }

}
