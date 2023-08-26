<?php
class AuthManager {
    private $dbConnection;

    public function __construct(DatabaseConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function loginUser($username, $password) {
       
        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($query);

        if (!$stmt) {
            throw new Exception("Query preparation failed");
        }

        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user=$result->fetch_assoc();
            session_start();
            $_SESSION['username'] = $username;

            if($user['role'] === 'admin'){
                header('Location: ../frontend/View/AdminDashboard.php');

            }elseif($user['role'] === 'user'){
                header('Location: ../frontend/View/UserDashboard.php');
            }else
            {
                echo "unknown";
            }

          
            exit();
        } else {
        echo "Invalid username or password";
        }

        $stmt->close();
    }
}
