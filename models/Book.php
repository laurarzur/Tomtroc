<?php

/**
 * Entité représentant un livre défini par les champs
 * id, title, author, review, available, img, owner_id
 */
class Book extends AbstractEntity
{
    private string $title;
    private string $author;
    private string $review;
    private int $available; 
    private string $img;
    private int $ownerId;

    /**
     * Setter pour le titre.
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Getter pour le titre.
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Setter pour l'auteur.
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * Getter pour l'auteur.
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Setter pour la description.
     * @param string $review
     */
    public function setReview(string $review): void
    {
        $this->review = $review;
    }

    /**
     * Getter pour la description.
     * Retourne les $length premiers caractères de la description.
     * @param int $length : le nombre de caractères à retourner.
     * Si $length n'est pas défini (ou vaut -1), on retourne toute la description.
     * Si la description est plus grande que $length, on retourne les $length premiers caractères avec "..." à la fin.
     * @return string
     */
    public function getReview(int $length = -1): string
    {
        if ($length > 0) {
            // Ici, on utilise mb_substr et pas substr pour éviter de couper un caractère en deux (caractère multibyte comme les accents).
            $review = mb_substr($this->review, 0, $length);
            if (strlen($this->review) > $length) {
                $review .= "...";
            }
            return $review;
        }
        return $this->review;
    }

    /**
     * Setter pour la disponibilité.
     * @param int $available
     */
    public function setAvailable(int $available): void
    {
        $this->available = $available;
    }

    /**
     * Getter pour la disponibilité.
     * @return int
     */
    public function getAvailable(): int
    {
        return $this->available;
    }

    /**
     * Setter pour l'image.
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * Getter pour l'image'.
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * Setter pour l'id du propriétaire. 
     * @param int $ownerId
     */
    public function setOwnerId(int $ownerId): void
    {
        $this->ownerId = $ownerId;
    }

    /**
     * Getter pour l'id du propriétaire.
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }


}
