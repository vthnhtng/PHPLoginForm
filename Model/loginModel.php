<?php

class LoginModel
{
    public function getLogin()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            try {
                $mysql_server_name = "localhost";
                $mysql_username = "root";
                $mysql_password = "vthnhtng@0511";
                $database_name = "myapp";
                $mysql_connection = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $database_name);
                $mysql_query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $result = mysqli_query($mysql_connection, $mysql_query);

                if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['birthday'] = $row['birthday'];
                        $_SESSION['email'] = $row['email'];

                    }
                    return $_SESSION['id'];
                } else {
                    return "authorization_error";
                }

                mysqli_close($mysql_connection);
            } catch (Exception $e) {
                return "mysql_error";
            }
        } else {
            return "form_error";
        }
    }
}
