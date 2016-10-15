<?php 
class ClientManager
{
	  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

    public function create(Client $client)
  {
    $q = $this->_db->prepare('INSERT INTO clientW VALUES( :x1, :x2, :x3, :x4,:x5,:x6)');

    $q->bindValue(':x1', $client->id_client_client(), PDO::PARAM_INT);
    $q->bindValue(':x2', $client->nom_clien(), PDO::PARAM_INT);
    $q->bindValue(':x3', $client->prenom_client(), PDO::PARAM_INT);
    $q->bindValue(':x4', $client->password(), PDO::PARAM_INT);
    $q->bindValue(':x5', $client->num_client(), PDO::PARAM_INT);
    $q->bindValue(':x6', $client->adresse_livraison(), PDO::PARAM_INT);

    $result = $q->execute();
    return $result;
  }




  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>