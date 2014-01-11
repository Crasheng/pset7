<?php

    require("../includes/config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //get user id
        $id = $_SESSION["id"];

        //check stock
        $stock = lookup($_POST["stock"]);
        if($stock === false)
        {
            apologize("Invalid stock");
        }

        $array = query("SELECT cash FROM users WHERE id= ?", $id);
        
        //total sharing price
        $tot_sh_price = $stock["price"] * $_POST["quantity"];
       
        //Is there enough money.
        if($tot_sh_price > $array[0]["cash"])
        {
            apologize("You Don't have enough money");
        }
       
        //remain cash
        $cash_now = $array[0]["cash"] -  $tot_sh_price;
       
    
        $check_port = query("INSERT INTO portofolio (id, symbol,shares) values(?, ?, ?)", $id, $stock["symbol"], $_POST["quantity"]);
        if($check_port === false)
        {
            $array = query("SELECT shares FROM portofolio WHERE id = ?  AND symbol = ? ", $id, $stock["symbol"]);
            $total_shares = $array[0]["shares"] + $_POST["quantity"];
            //print_r($cash_now);
            //die();
            $check_port = query("UPDATE portofolio SET shares = ? WHERE id = ? AND symbol = ?",$total_shares, $id, $stock["symbol"]);
            if($check_port === false)
            {
                apologize("Something Wrong!");
            }

        }

        $check_port = query("UPDATE users SET cash = ? WHERE id = ?", $cash_now, $id);
        if($check_port === false)
        {
            apologize("Something Wrong!");
        }

        $here = query("INSERT INTO history (id, transact, symbol, shares, price) VALUES (?,?,?, ?, ?)",$id,"Buy", $_POST["stock"], $_POST["quantity"], $tot_sh_price);

        if($here === false)
        {
            apologize("A7emm");
        }

        redirect("index.php");
    }
    else
    {
        render("buy_form.php", ["title"=> "Buy"]);
    }

?>
