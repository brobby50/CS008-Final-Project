<?php
include ('top.php');

    // Open a CSV file
    $debug = false;

    if (isset($_GET["debug"])) {
        $debug = true;
    }

    $myFolder = 'data/';

    $myFileName = 'questions';

    $fileExt = '.csv';

    $filename = $myFolder . $myFileName . $fileExt;

    if ($debug){
        print '<p>filename is ' . $filename;
    }
    $file = fopen($filename, "r");

    if ($debug) {
        if ($file) {
            print '<p>File Opened Succesful.</p>';
        } else {
            print '<p>File Open Failed.</p>';
        }
    }

    //read data
        if ($file) {
            if ($debug){
                print '<p>Begin reading data into an array.</p>';
            }
            // read all the data
            while (!feof($file)) {
                $questionDetails[] = fgetcsv($file);
            }

            if ($debug) {
                print '<p>Finished reading data. File closed.</p>';
                print '<p>My data array<p><pre> ';
                print_r($questionDetails);
                print '</pre></p>';
            }
        } // ends if file was opened 
    //close file
        fclose($file);
?>

<article id ='content'>
    <h2>Weather Change</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Question</th>
            <th>Programming Language</th>
            <th>Repository</th>
            <th>Push Pull</th>
            <th>Branch</th>
            <th>Merging</th>
            <th>Other</th>
            <th>Git Experience</th>

        </tr>
<?php
    for($i = 0; $i < count($questionDetails); $i++){
        print'<tr>';
        print'<td>' . $questionDetails[$i][0] . '</td>';
        print'<td>' . $questionDetails[$i][1] . '</td>';
        print'<td>' . $questionDetails[$i][2] . '</td>';
        print'<td>' . $questionDetails[$i][3] . '</td>';
        print'<td>' . $questionDetails[$i][4] . '</td>';
        print'<td>' . $questionDetails[$i][5] . '</td>';
        print'<td>' . $questionDetails[$i][6] . '</td>';
        print'<td>' . $questionDetails[$i][7] . '</td>';
        print'<td>' . $questionDetails[$i][8] . '</td>';
        print'<td>' . $questionDetails[$i][9] . '</td>';
        print'</tr>' . PHP_EOL;
    }
   
    print '<tr><td colspan="10">' . count($questionDetails)." Total Questions Summited</td></tr>";
?>
</table>
        </article > <!--END OF CONTENT -->
<?php
include ('footer.php');
?>
    </body>
</html>