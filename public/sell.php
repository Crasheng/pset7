<?php
    
    //require configration
    require("../includes/config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $rows = query("SELECT *  FROM portofolio WHERE id = ?", $_SESSION["id"]);
       
        foreach($rows as $row)
        {
            if (in_array($_POST["stock"], $row))
            {
                if($_POST["quantity"] > $row["shares"])
                {
                    apologize("You Shares Very Small");
                }
                $total_price = $_POST["quantity"] * lookup($_POST["stock"])["price"] ;
                
                $check = query("UPDATE users SET cash = cash + ?  WHERE id = ?", $total_price, $_SESSION["id"]);

                if($_POST["quantity"] == $row["shares"])
                {
                    query("DELETE  FROM portofolio WHERE id = ? AND symbol = ? ", $_SESSION["id"], $_POST["stock"]);    
                }
                else
                {
                    query("UPDATE portofolio SET shares = ? WHERE id = ?", $row["shares"] - $_POST["quantity"], $_SESSION["id"]);
                }
                
                $here = query("INSERT INTO history (id, transact, symbol, shares, price) VALUES (?,?,?, ?, ?)",$_SESSION["id"],"Sell", $_POST["stock"], $_POST["quantity"], $total_price);
                
                if($here === false)
                {
                    apologize("A7emmm!");
                }
                redirect("/");
            }
        }
    }
    else
    {
        render("sell_form.php",["title"=> "Sell"]);
    }
?>
