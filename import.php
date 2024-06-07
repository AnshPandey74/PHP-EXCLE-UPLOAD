<?php
include 'db.php';
require 'vendor/autoload.php'; // Include the PhpSpreadsheet library

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST["Import"])) {

    $filename = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        // Load the XLSX file
        $spreadsheet = IOFactory::load($filename);
        $worksheet = $spreadsheet->getActiveSheet();

        // Loop through each row of the worksheet
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $emapData = [];
            foreach ($cellIterator as $cell) {
                $emapData[] = $cell->getValue();
            }

            // Ensure $emapData has enough elements before accessing them
            if (count($emapData) >= 8) {
                // Insert data into the subject table
                $sql = "INSERT INTO test (
                    Date, 
                    RegNo, 
                    SrNo, 
                    Name, 
                    Address, 
                    Location, 
                    Taluka, 
                    Dist, 
                    State, 
                    Pin, 
                    Country, 
                    LandlineNo, 
                    Mobile, 
                    WhatsappNo, 
                    Email, 
                    Subject, 
                    UpTo, 
                    Degree, 
                    PassingDate, 
                    DOB, 
                    BankName, 
                    AccountNo, 
                    IFSCCode, 
                    DDNo, 
                    DDDate, 
                    GuruName
                ) VALUES (
                    '$emapData[0]', 
                    '$emapData[1]', 
                    '$emapData[2]', 
                    '$emapData[3]', 
                    '$emapData[4]', 
                    '$emapData[5]', 
                    '$emapData[6]', 
                    '$emapData[7]', 
                    '$emapData[8]', 
                    '$emapData[9]', 
                    '$emapData[10]', 
                    '$emapData[11]', 
                    '$emapData[12]', 
                    '$emapData[13]', 
                    '$emapData[14]', 
                    '$emapData[15]', 
                    '$emapData[16]', 
                    '$emapData[17]', 
                    '$emapData[18]', 
                    '$emapData[19]', 
                    '$emapData[20]', 
                    '$emapData[21]', 
                    '$emapData[22]', 
                    '$emapData[23]', 
                    '$emapData[24]', 
                    '$emapData[25]'
                )";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    echo "<script type=\"text/javascript\">
                            alert(\"Invalid File: Please Upload XLSX File.\");
                            window.location = \"index.php\"
                          </script>";
                    exit();
                }
            }
        }

        // Throws a message if data successfully imported to MySQL database from Excel file
        echo "<script type=\"text/javascript\">
                alert(\"XLSX File has been successfully Imported.\");
                window.location = \"index.php\"
              </script>";

        // Close the connection
        mysqli_close($conn);
    }
}
?>