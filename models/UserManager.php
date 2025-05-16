<?php 

/**
 * Classe qui gère les utilisateurs.
 */
class UserManager extends AbstractEntityManager {

    /**
     * Inscrit un utilisateur.
     * @param User $user
     * @return void
     */
    public function signup(User $user) : void
    {
        $sql = "INSERT INTO user (username, email, pwd, createdAt) VALUES (:username, :email, :pwd, NOW())";
        $this->db->query($sql, [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(), 
            'pwd' => password_hash($user->getPwd(), PASSWORD_DEFAULT)
        ]);
    } 
    
    /**
     * Récupère un utilisateur par son email.
     * @param string $email
     * @return ?User
     */
    public function getUserByEmail(string $email) : ?User
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    } 

    /**
     * Modifie un utilisateur.
     * @param User $user : l'utilisateur à modifier.
     * @return void
     */
    public function updateUser(User $user) : void
    {
        $sql = "UPDATE user SET username = :username, email = :email, pwd = :pwd WHERE id = :id";
        $this->db->query($sql, [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(), 
            'pwd' => $user->getNewPwd() !== "" ? $user->getNewPwd() : $user->getPwd(), 
            'id' => $user->getId()
        ]);
    } 

    /**
     * Modifie l'image de profil d'un utilisateur.
     * @param string $avatar : l'image à insérer.
     * @return void
     */
    public function updateAvatar(string $avatar) : void
    {
        $sql = "UPDATE user SET avatar = :avatar WHERE id = :id";
        $this->db->query($sql, [
            'avatar' => $avatar,
            'id' => $_SESSION['idUser']
        ]);
    } 

    /**
     * Supprime un utilisateur.
     * @return void
     */
    public function deleteUser() : void
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $this->db->query($sql, ['id' => $_SESSION['idUser']]);
    }
    /**
     * Récupère un utilisateur par son id.
     * @param int $id
     * @return ?User
     */
    public function getUserById(int $id) : ?User
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    } 

}