<?php
/**
 * Authentication System
 * Handles user login, session management, and role-based access control
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'dbconnection.php';

/**
 * Check if user is logged in
 * @return bool True if user is logged in, false otherwise
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['username']);
}

/**
 * Check if current user is a manager
 * @return bool True if user is a manager, false otherwise
 */
function isManager() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'manager';
}

/**
 * Check if current user is an employee
 * @return bool True if user is an employee, false otherwise
 */
function isEmployee() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'employee';
}

/**
 * Get current user's information
 * @return array|null User information array or null if not logged in
 */
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    return [
        'user_id' => $_SESSION['user_id'],
        'username' => $_SESSION['username'],
        'full_name' => $_SESSION['full_name'],
        'role' => $_SESSION['role']
    ];
}

/**
 * Require user to be logged in
 * Redirects to login page if not logged in
 */
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

/**
 * Require user to be a manager
 * Redirects to home page if not a manager
 */
function requireManager() {
    requireLogin();
    if (!isManager()) {
        header("Location: home.php?error=access_denied");
        exit();
    }
}

/**
 * Login user with username and password
 * @param string $username Username
 * @param string $password Plain text password
 * @return array ['success' => bool, 'message' => string, 'user' => array|null]
 */
function login($username, $password) {
    try {
        $conn = getDBConnection();
        
        if (!$conn) {
            return ['success' => false, 'message' => 'Database connection failed', 'user' => null];
        }
        
        $stmt = $conn->prepare("SELECT user_id, username, password, full_name, role FROM users WHERE username = ?");
        
        if (!$stmt) {
            closeDBConnection($conn);
            return ['success' => false, 'message' => 'Database query preparation failed', 'user' => null];
        }
        
        $stmt->bind_param("s", $username);
        
        if (!$stmt->execute()) {
            $stmt->close();
            closeDBConnection($conn);
            return ['success' => false, 'message' => 'Database query execution failed', 'user' => null];
        }
        
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            $stmt->close();
            closeDBConnection($conn);
            return ['success' => false, 'message' => 'Invalid username or password', 'user' => null];
        }
        
        $user = $result->fetch_assoc();
        $stmt->close();
        closeDBConnection($conn);
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];
            
            return ['success' => true, 'message' => 'Login successful', 'user' => $user];
        } else {
            return ['success' => false, 'message' => 'Invalid username or password', 'user' => null];
        }
    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Login error: ' . $e->getMessage(), 'user' => null];
    } catch (Error $e) {
        return ['success' => false, 'message' => 'Fatal error: ' . $e->getMessage(), 'user' => null];
    }
}

/**
 * Logout current user
 */
function logout() {
    $_SESSION = array();
    
    // Destroy session cookie if it exists
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }
    
    session_destroy();
}
?>

