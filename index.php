<?php

include 'functions.php';

if ($_POST['search'])
{
    echo search($_POST["L_F_N"]);
}

elseif ($_POST['submit'])
{
    append();
}

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>List</title>
    </head>
    <body>
    <br>
    <form method="post" action="index.php">
        <br>

        <label>
            <input type="text" name="L_F_N" placeholder="Library Full Name" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="L_N" placeholder="Library Number" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="S_Y_F" placeholder="Survey Year From" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="O_L_S_R" placeholder="Ontario Library Service Region" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="T_O_L_S" placeholder="Type of Library Service" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="M_A" placeholder="Mailing Address" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="S_A" placeholder="Street Address" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="C_T" placeholder="City/Town" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="P" placeholder="Province" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="P_C" placeholder="Postal Code" autofocus/>
        </label> <br><br>
        <label>
            <input type="text" name="W_S_A" placeholder="Web Site Address" autofocus/>
        </label> <br><br>

        <button type="submit" name="search" class="search-button" value="Search">Search</button>

        <button type="submit" name="submit" class="submit-button" value="Submit">Submit</button>

        <button type="submit" name="edit" class="edit-button" value="Edit">Edit</button>

    </form>
    </body>
    </html>


<?php

echo "<table>\n";

if($doc  = fopen ("library1.csv", "r")) echo "success";

while (($row = fgetcsv($doc)) !== false) {

    echo "<tr>";
    foreach ($row as $unit) {

        echo "<td>" . $unit . "</td>";

    }
    echo "</tr>\n";

}

fclose($doc);

echo "\n</table>";

