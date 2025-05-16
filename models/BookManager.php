<?php

/**
 * Classe qui gère les livres.
 */
class BookManager extends AbstractEntityManager {

    
    /**
     * Ajoute un livre.
     * @param Book $book : le livre à ajouter.
     * @return void
     */
    public function addBook(Book $book) : void
    {
        $sql = "INSERT INTO book (title, author, review, available, img, owner_id) VALUES (:title, :author, :review, :available, :img, :owner_id)";
        $this->db->query($sql, [
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(), 
            'review' => $book->getReview(), 
            'available' => $book->getAvailable(), 
            'img' => $book->getImg(),
            'owner_id' => $book->getOwnerId()
        ]);
    } 

    /**
     * Modifie un livre.
     * @param Book $book : le livre à modifier.
     * @return void
     */
    public function updateBook(Book $book) : void
    {
        $sql = "UPDATE book SET title = :title, author = :author, review = :review, available = :available, img = :img, owner_id = :owner_id WHERE id = :id";
        $this->db->query($sql, [
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(), 
            'review' => $book->getReview(), 
            'available' => $book->getAvailable(), 
            'img' => $book->getImg(),
            'owner_id' => $book->getOwnerId(), 
            'id' => $book->getId()
        ]);
    } 

    /**
     * Supprime un livre.
     * @param int $id : l'id du livre à supprimer.
     * @return void
     */
    public function deleteBook(int $id) : void
    {
        $sql = "DELETE FROM book WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }

    /**
     * Récupère tous les livres disponibles à l'échange.
     * @return array : un tableau d'objets Book.
     */
    public function getAllAvailableBooks() : array
    {
        $sql = "SELECT * FROM book WHERE available = 1";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    } 

     /**
     * Récupère un livre par son id.
     * @param int $id : l'id du livre.
     * @return Book|null : un objet Book ou null si le livre n'existe pas.
     */
    public function getBookById(int $id) //: ?Book
    {
        $sql = "SELECT * FROM book WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }

    /**
     * Récupère tous les livres disponibles d'un utilisateur. 
     * @param int $id : l'id de l'utilisateur
     * @return array : un tableau d'objets Book.
     */ 
    public function getAllAvailableBooksByOwner(int $id) //: array 
    {
        $sql = "SELECT * FROM book WHERE available = 1 AND owner_id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    } 

     /**
     * Récupère tous les livres de l'utilisateur connecté.
     * @return array : un tableau d'objets Book.
     */
    public function getAllBooksByOwner() : ?array 
    {
        $sql = "SELECT * FROM book WHERE available = 1 AND owner_id = :id";
        $result = $this->db->query($sql, ['id' => $_SESSION['idUser']]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }
}