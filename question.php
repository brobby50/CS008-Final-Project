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
    <h2>Question Form</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Question</th>
            <th>Programming Language</th>
            <th>About</th>
            <th>Git Experience</th>

        </tr>
<?php
    for($i = 1; $i < count($questionDetails)-1; $i++){
        print'<tr>';
        print'<td>' . $questionDetails[$i][0] . '</td>';
        print'<td>' . $questionDetails[$i][1] . '</td>';
        print'<td>' . $questionDetails[$i][2] . '</td>';
        print'<td>' . $questionDetails[$i][3] . '</td>';
        print'<td>';
        if ($questionDetails[$i][4] == 1) {
            print 'Repository';
            if($questionDetails[$i][5] == 1 || $questionDetails[$i][6] == 1 || $questionDetails[$i][7] == 1 || $questionDetails[$i][8] == 1){
                print ', ';
            }   
        }
        if ($questionDetails[$i][5] == 1) {
            print 'Push Pull';
            if($questionDetails[$i][6] == 1 || $questionDetails[$i][7] == 1 || $questionDetails[$i][8] == 1){
                print ', ';
            }
        }
        if ($questionDetails[$i][6] == 1) {
            print 'Branch';
            if($questionDetails[$i][7] == 1 || $questionDetails[$i][8] == 1){
                print ', ';
            }
        }
        if ($questionDetails[$i][7] == 1) {
            print 'Merging';
            if($questionDetails[$i][8] == 1){
                print ', ';
            }
        }
        if ($questionDetails[$i][8] == 1) {
            print 'Other';
        }
        print'</td>';

        print'<td>' . $questionDetails[$i][9] . '</td>';
        print'</tr>' . PHP_EOL;
    }
   
    print '<tr><td colspan="6">' . count($questionDetails)." Total Questions Summited</td></tr>";
?>
</table>
        </article > <!--END OF CONTENT -->
<?php
include ('footer.php');
?>
    </body>
</html>