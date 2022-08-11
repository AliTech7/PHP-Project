<?php

function append()
{
    $chart = array(
        "L_F_N" => $_POST["L_F_N"] ?? "",
        "L_N" => $_POST["L_N"] ?? "",
        "S_Y_F" => $_POST["S_Y_F"] ?? "",
        "O_L_S_R" => $_POST["O_L_S_R"] ?? "",
        "T_O_L_S" => $_POST["T_O_L_S"] ?? "",
        "M_A" => $_POST["M_A"] ?? "",
        "S_A" => $_POST["S_A"] ?? "",
        "C_T" => $_POST["C_T"] ?? "",
        "P" => $_POST["P"] ?? "",
        "P_C" => $_POST["P_C"] ?? "",
        "W_S_A" => $_POST["W_S_A"] ?? "",
    );

    $a = fopen("library.csv", "a+");

    if (!fputcsv($a, $chart)) {
        die("LIII");
    }

    fclose($a);
}

function search($name): string
{
    $s = fopen("library.csv", "r");
    $outcome = "Not Found";

    while ($line = fgetcsv($s)) {
        if ($line[0] == $name) {
            $outcome = implode(' - ', $line);
            break;
        }
    }
    fclose($s);
    return $outcome;
}

function editor(): string
{

    $handle1 = fopen("_csv\library1.csv", "r");
    $handle2 = fopen("_csv\library1.csv", "w");

    while (($data = fgetcsv($handle1, 1000, ",")) !== FALSE) {

        if ($data[0] == $_POST["L_F_N"]) {
            $data[0] = $_POST["L_F_N"] ?? "";
            $data[1] = $_POST["L_N"] ?? "";
            $data[2] = $_POST["S_Y_F"] ?? "";
            $data[3] = $_POST["O_L_S_R"] ?? "";
            $data[4] = $_POST["T_O_L_S"] ?? "";
            $data[5] = $_POST["M_A"] ?? "";
            $data[6] = $_POST["S_A"] ?? "";
            $data[7] = $_POST["C_T"] ?? "";
            $data[8] = $_POST["P"] ?? "";
            $data[9] = $_POST["P_C"] ?? "";
            $data[10] = $_POST["W_S_A"] ?? "";
            $result = "Update was successful\"";
        }

        fputcsv($handle2, $data);
    }

    fclose($handle2);

    fclose($handle1);


    $handle1 = fopen("_csv\library1.csv", "r");
    $handle2 = fopen("_csv\library1.csv", "w");
    while (($data = fgetcsv($handle1, 1000, ",")) !== FALSE) {

        fputcsv($handle2, $data);
    }
    fclose($handle2);

    fclose($handle1);

    return $result;
}
