<?php
class GestionPlayers {
    private $mysqli;

    // Constructeur
    public function __construct($hostname, $username, $password, $database) {
        $this->mysqli = new mysqli($hostname, $username, $password, $database);

        if ($this->mysqli->connect_error) {
            die("La connexion a échoué : " . $this->mysqli->connect_error);
        }
    }

    public function listerPlayers() {
        $query = "SELECT * FROM players";
        $result = $this->mysqli->query($query);
        $players = [];
        while ($row = $result->fetch_assoc()) {
            $players[] = $row;
        }
        return $players;
    }

    // Méthode pour créer un nouvel utilisateur
    public function creerPlayer($nom, $position,$nationalité, $mot_de_passe) {
        $nom = $this->mysqli->real_escape_string($nom);
        $email = $this->mysqli->real_escape_string($position);
        $nationalité = $this->mysqli->real_escape_string($nationalité);
        $mot_de_passe = $this->mysqli->real_escape_string($mot_de_passe);
        
        $query = "INSERT INTO players (name, position, nationality, password) VALUES ('$nom', '$position', '$nationalité', '$mot_de_passe')";
        return $this->mysqli->query($query);
    }

    // Méthode pour récupérer un joueur par son ID
    public function getPlayerParID($id) {
        $id = $this->mysqli->real_escape_string($id);
        
        $query = "SELECT * FROM players WHERE id = $id";
        $result = $this->mysqli->query($query);
        
        return $result->fetch_assoc();
    }

    // Méthode pour mettre à jour un joueur
    public function mettreAJourPlayer($id, $nouveau_nom, $nouvel_position, $nouvel_nationalité, $nouveau_mot_de_passe) {
        $id = $this->mysqli->real_escape_string($id);
        $nouveau_nom = $this->mysqli->real_escape_string($nouveau_nom);
        $nouvel_position = $this->mysqli->real_escape_string($nouvel_position);
        $nouvel_nationalité = $this->mysqli->real_escape_string($nouvel_nationalité);
        $nouveau_mot_de_passe = $this->mysqli->real_escape_string($nouveau_mot_de_passe);
        
        $query = "UPDATE players SET name='$nouveau_nom', position='$nouvel_position', nationality='$nouvel_nationalité', password='$nouveau_mot_de_passe' WHERE id=$id";
        return $this->mysqli->query($query);
    }

    // Méthode pour supprimer un joueur
    public function supprimerPlayer($id) {
        $id = $this->mysqli->real_escape_string($id);
        
        $query = "DELETE FROM players WHERE id=$id";
        return $this->mysqli->query($query);
    }

    // Destructeur
    public function __destruct() {
        $this->mysqli->close();
    }
}

// Exemple d'utilisation de la classe
/*$gestionUtilisateurs = new GestionUtilisateurs("localhost", "root", "root", "dbpoo");

// Créer un nouvel utilisateur
$gestionUtilisateurs->creerUtilisateur("John Doe", "john.doe@example.com", "motdepasse123");

// Récupérer un utilisateur par ID
$utilisateur = $gestionUtilisateurs->getUtilisateurParID(3);
print_r($utilisateur);

// Mettre à jour un utilisateur
$gestionUtilisateurs->mettreAJourUtilisateur(1, "Jane Doe", "jane.doe@example.com", "nouveaumotdepasse123");

// Supprimer un utilisateur
$gestionUtilisateurs->supprimerUtilisateur(2);
*/
?>