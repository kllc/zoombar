<?php
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
		echo ("<div class=\"list up\">");
		echo ("<a href=\"z?id=".$row["memid"]."\">");
		echo ("<figure><div class=\"bg\" style=\"background-image: url(import_media.php?target=".$row["fname"].");\" alt=\"sample name\"></div></figure>");
		echo ("<h4>".$row["name"]."</h4>");
		echo ("<p>".$row["comment_small"]."</p>");
		if ($row["rank"]>10000){echo("<span class=\"mark1\">人気</span>");};
		echo ("</a></div>");
    }
?>