<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/eCommerce/core/init.php';
    $mode = sanitize($_POST['mode']);
    $edit_size = sanitize($_POST['edit_size']);
    $edit_id = sanitize($_POST['edit_id']);
    $cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
    $result = mysqli_fetch_assoc($cartQ);
    $items = json_decode($result['items'],true);
    $updated_items = array();
    $domain = (($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST']:false);

    // Check on the two modes (Adding an item and editing an item in the mycart page) 
    if($mode == 'removeone'){
        foreach($items as $item){
            if($item['id'] == $edit_id && $item['size'] == $edit_size){
                $item['quantity'] = $item['quantity'] - 1;
            }
            if($item['quantity'] > 0){
                $updated_$items[] = $item;
            }
        }
    }
    if($mode == 'addone'){
        foreach($items as $item){
            if($item['id'] == $edit_id && $item['size'] == $edit_size){
                $item['quantity'] = $item['quantity'] + 1;
            }
                $updated_$items[] = $item;
        }
    }
    
    if(!empty($updated_items)){
        $json_updated = json_encode($updated_items);
        $db->query("UPDATE cart SET items = '{$json_updated}' WHERE id = '{$cart_id}'");
        $_SESSION['success_flash'] = 'Your shopping cart has been updated!';
    }
    
    if(empty($updated_items)){
        $db->query("DELETE FROM cart WHERE id = '{$cart_id}'");
        setcookie(CART_COOKIE,'',1,"/",$domain,false);
    }
?>