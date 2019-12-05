<?php

function redirect($location) {
    return header("location:" . $location);
}

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

function users_online() {
    if (isset($_GET['onlineusers'])) {
        global $connection;
        if (!$connection) {
    session_start();
    include ("../includes/db.php");

        $session = session_id();
        $time = time();
        $time_out_in_seconds = 30;
        $time_out = $time - $time_out_in_seconds;

        $query = "select * from users_online where session = '$session' ";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);
        if ($count == null) {
            mysqli_query($connection, "insert into users_online(session , time ) values('$session', '$time')");
        } else {
            mysqli_query($connection, "UPDATE users_online SET time = '$time' where  session = '$session'");
        }
        $users_online_query = mysqli_query($connection, "select * from users_online where time > '$time_out'");
        echo $count_user = mysqli_num_rows($users_online_query);
    }

    } // GET request isset()
}
users_online();

function confirm($result) {
    global $connection;
if(!$result) {
    die ("Query Failed. " . mysqli_error($connection));
    }
}

function insert_categories(){
    global $connection;

    if(isset($_POST['submit'])) {
        $fac_name = $_POST['fac_name'];
    
        if($fac_name == "" || empty($fac_name)) {
            echo "This feild should not be empty ";
        } else {
            $query = "insert into faculty(fac_name) ";
            $query .= "value('{$fac_name}') ";
    
            $create_category_query = mysqli_query($connection, $query);
    
            if(!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
    
        }
    
    }

}

function find_categories() {
    global $connection;
    $query = "select * from faculty";
    $sel_categories = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($sel_categories)) {
            $fac_id = $row['fac_id'];
            $fac_name = $row['fac_name'];
            echo "<tr>";
            echo "<td>{$fac_id}</td>" ; 
            echo "<td>{$fac_name}</td>" ; 
            echo "<td><a href='categories.php?delete={$fac_id}'>Delete</a></td>" ; 
            echo "<td><a href='categories.php?edit={$fac_id}'>Edit</a></td>" ;
            echo "</tr>";

         }
}

function delete_categories() {
    global $connection;
    if(isset($_GET['delete'])) {
        $del_fac_id = $_GET['delete'];
        $query = "delete from faculty where fac_id = {$del_fac_id}";

        $delete_query = mysqli_query($connection, $query);
        header("location: categories.php");
    }
}

function recordCount($table) {
    global $connection;
    $query = "SELECT * FROM " . $table;
    $sel_all_post = mysqli_query($connection, $query);
    return mysqli_num_rows($sel_all_post);
}

function is_admin($username) {
    global $connection;
    $query = "select user_role from users where username = '$username'";
    $result =  mysqli_query($connection, $query);
    confirm($result);

    $row = mysqli_fetch_array($result);
    if ($row['user_role'] == 'admin') {
        return true;
    }else {
        return false;
    }

}

function username_exists($username) {
    global $connection;
    $query = "select username from users where username = '$username'";
    $result =  mysqli_query($connection, $query);
    confirm($result);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }

}

function email_exists($user_email) {
    global $connection;
    $query = "select user_email from users where user_email = '$user_email'";
    $result =  mysqli_query($connection, $query);
    confirm($result);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }

}

function register_user($username, $user_firstname, $user_lastname, $user_email, $password) {
global $connection;
$username = $_POST['username'];
$user_firstname = $_POST['firstname'];
$user_lastname = $_POST['lastname'];
$user_email = $_POST['email'];
$password = $_POST['password'];

$username      = mysqli_real_escape_string($connection, $username);
$user_firstname = mysqli_real_escape_string($connection, $user_firstname);
$user_lastname  = mysqli_real_escape_string($connection, $user_lastname);
$user_email    = mysqli_real_escape_string($connection, $user_email);
$password      = mysqli_real_escape_string($connection, $password);
$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

$query = "INSERT INTO users(username, user_firstname, user_lastname, user_email, user_password, user_role) ";
$query .= "VALUES('$username', '$user_firstname', '$user_lastname', '$user_email', '$password', 'member' )";
$register_user_query = mysqli_query($connection, $query);
confirm($register_user_query);
if (mysqli_affected_rows($register_user_query = 1)) {
    login_user($username, $password);
    redirect("../index.php");
}

}

function login_user($username, $password) {
    global $connection;
    $username = trim($username);
    $password = trim($password);
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "select * from users where username = '{$username}' ";
    $sel_username_query = mysqli_query($connection, $query);

    if(!$sel_username_query) {
        die("QUERY Failed". mysqli_error($connection) );
    }

    while ($row = mysqli_fetch_array($sel_username_query)) {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_email = $row['user_email'];
        $db_user_role = $row['user_role'];

    }

    if(password_verify($password, $db_user_password)){
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['email'] = $db_user_email;
        $_SESSION['user_role'] = $db_user_role;
        header("location: ../admin");


    } else {
    redirect("signin.php");

    }
}

function isLoggedIn() {
    if (isset($_SESSION['user_role'])) {
        return true;
    }
    return false;
}


?>