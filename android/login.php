<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'connect.php';

    $sql = "SELECT * FROM login WHERE email='$email' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['masuk'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response);

        if ( password_verify($password, $row['password']) ) {
            
            $index['name'] = $row['nama_user'];
            $index['email'] = $row['email'];
            $index['id'] = $row['id'];

            array_push($result['masuk'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($conn);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

            mysqli_close($conn);

        }

    }

}

?>