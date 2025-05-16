<?php

/**
 * Entité représentant un utilisateur défini par les champs
 * id, username, email, pwd, created_at, avatar
 */
class User extends AbstractEntity
{
    private string $username;
    private string $email;
    private string $pwd = ""; 
    private string $newPwd = "";
    private ?DateTime $createdAt = null;
    private string $avatar = "";

    /**
     * Setter pour le nom d'utilisateur.
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * Getter pour le nom d'utilisateur.
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Setter pour l'email.
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Getter pour l'email.
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Setter pour le mot de passe.
     * @param string $pwd
     */
    public function setPwd(string $pwd): void
    {
        $this->pwd = $pwd;
    }

    /**
     * Getter pour le mot de passe.
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    } 

    /**
     * Setter pour le nouveau mot de passe (en cas de changement de mot de passe).
     * @param string $newPwd
     */
    public function setNewPwd(string $newPwd): void
    {
        $this->newPwd = $newPwd;
    }

    /**
     * Getter pour le nouveau mot de passe.
     * @return string
     */
    public function getNewPwd(): string
    {
        return $this->newPwd;
    }

    /**
     * Setter pour la date de création. Si la date est une string, on la convertit en DateTime.
     * @param string|DateTime $createdAt
     * @param string $format : le format pour la convertion de la date si elle est une string.
     * Par défaut, c'est le format de date mysql qui est utilisé. 
     */
    public function setCreatedAt(string|DateTime $createdAt, string $format = 'Y-m-d H:i:s'): void
    {
        if (is_string($createdAt)) {
            $createdAt = DateTime::createFromFormat($format, $createdAt);
        }
        $this->createdAt = $createdAt;
    }

    /**
     * Getter pour la date de création.
     * Grâce au setter, on a la garantie de récupérer un objet DateTime.
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Setter pour l'image de profil.
     * @param string $avatar
     */
    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * Getter pour l'image de profil.
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

}
