<?php

    // configuration
    require("../includes/config.php"); 

    //get user id
    $id = $_SESSION["id"];

    //get  user data from portofolio
    $rows = query("SELECT * FROM portofolio WHERE id = ?", $id);
    
    $cash = query("SELECT cash FROM users WHERE id= ? ", $id);

    $position = []; 
    
    if($rows !== false)
    {
        foreach($rows as $row)
        {
            $stock = lookup($row["symbol"]);
            if($stock !== false)
            {
                $position[] = [
                    "name" => $stock["name"],
                    "price" => $stock["price"],
                    "shares" => $row["shares"],
                    "symbol" => $row["symbol"]
                    ];
            }
        }
        render("portfolio.php",  ["title" => "Home", "positions" => $position, "cash" => $cash[0]["cash"]]);

    }
    else
    {
        // render portfolio
        render("portfolio.php", ["title" => "Portfolio", "positions" =>[], "cash" => $cash[0]["cash"]]);
    }

?>
