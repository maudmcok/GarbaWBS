<?php
class Client {

	// id_client of Client
	private $_id_client_client;
	// nom_client of Client
	private $_nom_client;
	// nom_client of Client
	private $_prenom_client;
	// adresse of Client 
	private $_password;
		// numero of Client
	private $_num_client;
	// adresse of Client 
	private $_adresse_livraison;




	/**
	 * Client constructor
	 */
	public function __construct($x1=null,$x2=null,$x3=null,$x4=null,$x5=null,$x6=null){	
		$this->setid_client_client($x1)   ;
		$this->setNom_client($x2) ;
		$this->setPrenom_client($x3) ;
		$this->setPassword($x4) ;
		$this->setNum_client($x5) ;
		$this->setAdresse_livraison($x6) ;
	}


	/**
	 * define param to Client
	 * @param Client donnees
	 */
	public function hydrate(array $donnees)
	{
	  foreach ($donnees as $key => $value)
	  {
	    // On récupère le nom du setter correspondant à l'attribut.
	    $method = 'set'.ucfirst($key);
	       
	    // Si le setter correspondant existe.
	    if (method_exists($this, $method))
	    {
	      // On appelle le setter.
	      $this->$method($value);
	    }
	  }
	}
	


	/**
	 * Set id_client to Client
	 * @param i id_client
	 */
	public function setid_client_client($i){ $i =  $i; if ($i > 0) { $this->_id_client_client = $i; }	}
	
	/**
	 * Set nom_client to Client
	 * @param p nom_client
	 */
	public function setNom_client($p){   $this->_nom_client = $p; 	}

	/**
	 * Set nom_client to Client
	 * @param p nom_client
	 */
	public function setPrenom_client($pr){   $this->_prenom_client = $pr; 	}
	
	/**
	 * Set password to Client
	 * @param s password
	 */
	public function setPassword($s){ $s =  $s; if ( $s >= 0 ) { $this->_password = $s; }	}
	
	/**
	 * Set num_client to Client
	 * @param w num_client
	 */
	public function setNum_client($w){ $w =  $w; if ($w >= 0) { $this->_num_client = $w; }	}
	
	/**
	 * Set num_client to Client
	 * @param l num_client
	 */
	public function setAdresse_livraison($l){ $l =  $l; if ($l >= 0) { $this->_adresse_livraison = $l; }	}

	
	/**
	 * Get id_client of Client
	 * @return id_client
	 */
	public function id_client_client(){ return $this->_id_client_client; }	

	/**
	 * Get nom_client of Client
	 * @return nom_client
	 */
	public function nom_client(){ return $this->_nom_client;	}	

	/**
	 * Get prenom_client of Client
	 * @return prenom_client
	 */
	public function prenom_client(){ return $this->_prenom_client;	}	

	/**
	 * Get password of Client
	 * @return password
	 */
	public function password(){ return $this->_password;	}	

	/**
	 * Get num_client of Client
	 * @return num_client
	 */
	public function num_client(){ return $this->_num_client;	}	

	/**
	 * Get num_client of Client
	 * @return adresse_livraison
	 */
	public function num_client(){ return $this->_adresse_livraison;	}
	



}

?>