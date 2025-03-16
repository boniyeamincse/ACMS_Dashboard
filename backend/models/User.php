<?php

namespace BoniyeaminCSE\ACMSDashboard\Models;

use PDO;
use Exception;

class User
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Create a new user
    public function createUser($username, $password, $email, $role)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            throw new Exception("Error creating user: " . $e->getMessage());
        }
    }

    // Retrieve a user by ID
    public function getUserById($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error retrieving user: " . $e->getMessage());
        }
    }

    // Retrieve a user by username
    public function getUserByUsername($username)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error retrieving user: " . $e->getMessage());
        }
    }

    // Update a user
    public function updateUser($id, $username, $email, $role)
    {
        try {
            $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email, role = :role WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (Exception $e) {
            throw new Exception("Error updating user: " . $e->getMessage());
        }
    }

    // Delete a user
    public function deleteUser($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (Exception $e) {
            throw new Exception("Error deleting user: " . $e->getMessage());
        }
    }

    // Authenticate a user
    public function authenticateUser($username, $password)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                throw new Exception("Invalid username or password");
            }
        } catch (Exception $e) {
            throw new Exception("Error authenticating user: " . $e->getMessage());
        }
    }

    // Change user password
    public function changePassword($id, $newPassword)
    {
        try {
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (Exception $e) {
            throw new Exception("Error changing password: " . $e->getMessage());
        }
    }
}