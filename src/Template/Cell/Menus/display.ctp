<div class="notification-icon" id="notification-icon">
					<a class="toggleMenu" href="#"><span class="header-picto"></span></a>
		<ul class="nav">
			<li  class="test">
				<a>Operationnel</a>
				<ul>
					<li>
						<li><?= $this->Html->link(__('Demandes'), ['controller' => 'Demandes','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Opérations'), ['controller' => 'Operations','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Les tâches'), ['controller' => 'OperationEtapeTaches','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Les factures'), ['controller' => 'Ext1kfactureOperations','action' => 'index']) ?>
					</li>
				</ul>
			</li>
			<li>
				<a>Visu/Analyse</a>
				<ul>
					<li>
						<li><?= $this->Html->link(__(''), ['controller' => 'Demandes','action' => 'index']) ?>
					</li>
				</ul>
			</li>
			<li>
				<a>Statistiques</a>
				<ul>
					<li>
						<li><?= $this->Html->link(__(''), ['controller' => 'Demandes','action' => 'index']) ?>
					</li>
				</ul>
			</li>
			<li>
				<a >Admin</a>
				<ul>
					<li>
						<li><?= $this->Html->link(__('Partenaires'), ['controller' => 'Partenaires','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Contacts'), ['controller' => 'Contacts','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Utilisateurs'), ['controller' => 'Utilisateurs','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Utilisateurs Types'), ['controller' => 'UtilisateurTypes','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Opérations Types'), ['controller' => 'OperationTypes','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Etapes'), ['controller' => 'Etapes','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Les Taches'), ['controller' => 'Taches','action' => 'index']) ?>
					</li>
					<li>
						<li><?= $this->Html->link(__('Routeur'), ['controller' => 'Routeurs','action' => 'index']) ?>
					</li>
				</ul>
			</li>
		</ul>
</div>