<?php 

session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(!$_SESSION['auth_user']["usersUid"]){
        $_SESSION["status"] = 'You need to login first';
        header("location: login.php");
    }else{
        if(isset($_POST['add_to_cart'])){
            if(isset($_SESSION['cart'])){
                $myitems = array_column($_SESSION['cart'], 'item_name');
    
                if(in_array($_POST['item_name'], $myitems)){
                    echo"<script>alert
                    ('Item already added');
                    window.location.href='javascript:history.go(-1)';
                    </script>";
        
                }else{
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array(
                    'item_img'=>$_POST['item_img'],
                    'item_name'=>$_POST['item_name'],
                    'price'=>   $_POST['item_price'], 
                    'Quantity'=>1);
                    echo"<script>
                    window.location.href='javascript:history.go(-1)';
                    </script>";
            }
    
            }else{
                $_SESSION['cart'][0] = array('item_img'=>$_POST['item_img'],'item_name'=>$_POST['item_name'],'price' => $_POST['item_price'], 'Quantity'=>1);
                echo"<script>
                window.location.href='javascript:history.go(-1)';
                </script>";
            }
        }
    }

    if(isset($_POST['remove_item'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['item_name'] == $_POST['item_name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script>
                window.location.href='javascript:history.go(-1)';
                </script>";
            }
         
        }
    }

    if(isset($_POST['Mod_Quantity'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['item_name'] == $_POST['item_name']){

                
                $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
                echo"<script>
                window.location.href='mycart.php';
                </script>";
            }
         
        }
    }

}
