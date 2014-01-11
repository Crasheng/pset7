<?php
    
    require("../includes/config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["req_stock"]))
        {
            apologize("Enter Your required stock");
        }
        
        //search about it
        $search = lookup($_POST["req_stock"]);

        if( $search !== false)
        {
            render("lookup_output.php", ["title" => "Result", "symbol" => $search["symbol"] , "price" => $search["price"]]);
        }
        else
        {
            apologize("Invalid Symbol");
        }
    }
    else
    {
        render("lookup_form.php", ["title" => "Looking Up"]);
    }   



?>
