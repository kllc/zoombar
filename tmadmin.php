<?php
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
		echo ("<div class=\"list up\">");
		echo ("<a href=\"signup.html?id=".$row["memid"]."&pw=".hash("sha256", $row["memid"].$solt)."\">");
		echo ("<figure><div class=\"bg\" style=\"background-image: url(import_media.php?target=".$row["fname"].");\" alt=\"sample name\"></div></figure>");
		echo ("<h4>".$row["name"]."</h4>");
		echo ("<p>".$row["comment_small"]."</p>");
		echo ("</a></div>");
    }
?>