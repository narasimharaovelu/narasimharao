PHP database example - http://192.168.226.132 <br>
<?php
    /* Connect to database */
    $link = mysql_connect("192.168.226.134:3306", "root", "")
        or die("Could not connect : " . mysql_error());
    print "Connected successfully";
    mysql_select_db("test") or die("Could not select database");

    /* Perform SQL query */
    $query = "SELECT * FROM persons";
    $result = mysql_query($query)
	or die("Query failed : " . mysql_error());

    /* Print results in HTML */
    print "<table>\n";
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        print "\t<tr>\n";
        foreach ($line as $col_value) {
            print "\t\t<td>$col_value</td>\n";
        }
        print "\t</tr>\n";
    }
    print "</table>\n";
    mysql_free_result($result);

    /* Close connection */
    mysql_close($link);
?>
