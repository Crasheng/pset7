<?php
      
    require("../includes/config.php");
    
    $rows = query("SELECT * FROM history WHERE id = ? ", $_SESSION["id"]); 

    $positions = [];

    foreach($rows as $row)
    {
        $positions [] = [
            "Transact"=> $row["transact"],
            "Date_time"=> $row["date_time"],
            "Symbol"=> $row["symbol"],
            "Shares"=> $row["shares"],
            "Price"=>$row["price"]
            ];
    }
    
    render("history_temp.php",["title"=> "History", "positions"=> $positions]);
?>
