<?php

//for connection
function getConnection() {
    $con = mysqli_connect("localhost", "root", "", "swathi");
    if (!$con) {
        echo "failed to connect " . mysqli_error($con);
    }
    return $con;
}

// For insert, update and delete return int (0 or 1)
function executeQuery($query) {
    $val = 0;
    $con = getConnection();
    $result = mysqli_query($con, $query);
    if (!$result) {
        $val = 0;
    } else {
        $val = 1;
    }
    mysqli_close($con);
    return $val;
}

// To display record return as array
function getQuery($query) {
    $result = null;
    $con = getConnection();
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "Error :" . mysqli_error($con);
    }
    mysqli_close($con);
    return $result;
}

// Get No of Records in the table return int (1)
function getCount($query) {
    $count = 0;
    $result = null;
    $con = getConnection();
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    mysqli_close($con);
    return $count;
}

function get_status($status) {
    $result = '<input class="checkbox" type="checkbox" name="status" ';
    if ($status == "true") {
        $result.=" checked='checked'";
    }
    
    $result .= '/>';
    return $result;
}

function get_special_status($special_status) {
    $result1 = '<input class="checkbox" type="checkbox" name="special_status" ';
    if ($special_status == "true") {
        $result1.=" checked='checked'";
    }
    $result1 .= '/>';
    return $result1;
}

function get_cat_name($id) {
    $result = null;
    $con = getConnection();
    $result = mysqli_query($con, "select name from product_category where id = $id");
    if (!$result) {
        echo "Error :" . mysqli_error($con);
    }
    mysqli_close($con);
    foreach ($result as $value) {
        return $value['name'];
    }
}

function get_cat_name_imageid($id) {
    $result = null;
    $myid;
    $con = getConnection();
    $result1 = mysqli_query($con, "select category_id from product where id = $id");
    foreach ($result1 as $value1) {
        $myid = $value1['category_id'];
    }  
    $result = mysqli_query($con, "SELECT name FROM product_category WHERE id =$myid");
    if (!$result) {
        echo "Error :" . mysqli_error($con);
    }
    mysqli_close($con);
    foreach ($result as $value) {
        return $value['name'];
    }
}

function get_product_name($id) {
    $result = null;
    $con = getConnection();
    $result = mysqli_query($con, "select name from product where id = $id");
    if (!$result) {
        echo "Error :" . mysqli_error($con);
    }
    mysqli_close($con);
    foreach ($result as $value) {
        return $value['name'];
    }
}

function get_cat_name_imageid_1($id) {
    $result = null;
    $myid;
    $con = getConnection();
    $result1 = mysqli_query($con, "select category_id from special_product where id = $id");
    foreach ($result1 as $value1) {
        $myid = $value1['category_id'];
    }  
    $result = mysqli_query($con, "SELECT name FROM product_category WHERE id =$myid");
    if (!$result) {
        echo "Error :" . mysqli_error($con);
    }
    mysqli_close($con);
    foreach ($result as $value) {
        return $value['name'];
    }
}
function get_sproduct_name($id) {
    $result = null;
    $con = getConnection();
    $result = mysqli_query($con, "select name from special_product where id = $id");
    if (!$result) {
        echo "Error :" . mysqli_error($con);
    }
    mysqli_close($con);
    foreach ($result as $value) {
        return $value['name'];
    }
}

?>