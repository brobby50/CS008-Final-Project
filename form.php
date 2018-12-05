<?php
include ('top.php');


print  PHP_EOL . '<!-- SECTION: 1 Initialize variables -->' . PHP_EOL;


print  PHP_EOL . '<!-- SECTION: 1a. debugging setup -->' . PHP_EOL;
if($debug){   
    print '<p>Post Array:</p><pre>';
    print_r($_POST);
    print '</pre>';
}
    
print PHP_EOL . '<!-- SECTION: 1b form variables -->' . PHP_EOL;
//
// initialize variables one for each form element
// in the order they appear on the form
$name = ""; 

$email = "rbeattie@uvm.edu";  

$question = "";

$language = "Python";    // pick the option

$repository = true;    // checked
$pushPull = false; // not checked
$branch = false; // not checked
$merging = false; // not checked
$other = false; // not checked

$experience = "Beginner";


print PHP_EOL . '<!-- SECTION: 1c form error flags -->' . PHP_EOL;

$nameERROR = false;

$emailERROR = false;

$questionERROR = false;

$typeERROR = false;
$totalChecked = 0;

$languageError = false;

$experienceERROR = false;

print PHP_EOL . '<!-- SECTION: 1d misc variables -->' . PHP_EOL;
$errorMsg = array(); 
$mailed = false; 


print PHP_EOL . '<!-- SECTION: 2 Process for when the form is submitted -->' . PHP_EOL;

if (isset($_POST["btnSubmit"])) {
    print PHP_EOL . '<!-- SECTION: 2a Security -->' . PHP_EOL;

    $thisURL = $domain . $phpSelf;

    if (!securityCheck($thisURL)) {
            $msg = '<p>Sorry you cannot access this page.</p>';
            $msg.= '<p>Security breach detected and reported.</p>';
            die($msg);
    }
    
    print PHP_EOL . '<!-- SECTION: 2b Sanitize (clean) data  -->' . PHP_EOL;

    $name = htmlentities($_POST["txtName"], ENT_QUOTES, "UTF-8");

    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    
    $question = htmlentities($_POST["txtQuestion"], ENT_QUOTES, "UTF-8");
  
    $language = htmlentities($_POST["1stLanguage"], ENT_QUOTES, "UTF-8");
    
    if (isset($_POST["chkRepositiry"])) {
    $repository = true;
    $totalChecked++;
    } else {
        $repository = false;
    }
    
    if (isset($_POST["chkPushPull"])) {
    $pushPull = true;
    $totalChecked++;
    } else {
        $pushPull = false;
    }
    
    if (isset($_POST["chkBranch"])) {
    $branch = true;
    $totalChecked++;
    } else {
        $branch = false;
    }
    
    if (isset($_POST["chkMerging"])) {
    $merging = true;
    $totalChecked++;
    } else {
        $merging = false;
    }
    
    if (isset($_POST["chkOther"])) {
    $other = true;
    $totalChecked++;
    } else {
        $other = false;
    }
    
    $experience = htmlentities($_POST["radExperience"], ENT_QUOTES, "UTF-8");
    
    
    print PHP_EOL . '<!-- SECTION: 2c Validation -->' . PHP_EOL;

    if ($name == "") {
        $errorMsg[] = "Please enter your name";
        $nameERROR = true;
    } elseif (!verifyAlphaNum($name)) {
        $errorMsg[] = "Your name appears to have extra character.";
        $nameERROR = true;
    }
    
    if ($email == "") {
        $errorMsg[] = 'Please enter your email address';
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {       
        $errorMsg[] = 'Your email address appears to be incorrect.';
        $emailERROR = true;    
    }
    
    if ($question == "") {
        $errorMsg[] = "Please enter your question";
        $questionERROR = true;
    }
    
    // checking radio buttons
    if ($experience != "Beginner" AND $experience != "Intermediate" AND $experience != "Proficient") {
        $errorMsg[] = "Please choose a experience level";
        $experienceERROR = true;
    }

    // checking checkboxes
    if ($totalChecked < 1) {
    $errorMsg[] = "Please choose at least one";
    $typeERROR = true;
    }
    
    //dropdown
    if ($language == "") {
    $errorMsg[] = "Please choose your programming language";
    $languageError = true;
    }
    
    
    print PHP_EOL . '<!-- SECTION: 2d Process Form - Passed Validation -->' . PHP_EOL;

    if (!$errorMsg) {
        if ($debug){
            print '<p>Form is valid</p>';
        }

        
        print PHP_EOL . '<!-- SECTION: 2e Save Data -->' . PHP_EOL;

        
        $dataRecord = array(); 

        $dataRecord[] = $name;
        
        $dataRecord[] = $email;
        
        $dataRecord[] = $question;
        
        $dataRecord[] = $language;
        
        $dataRecord[] = $repository;
        $dataRecord[] = $pushPull;
        $dataRecord[] = $branch;
        $dataRecord[] = $merging;
        $dataRecord[] = $other;
        
        $dataRecord[] = $experience;

        
        // setup csv file
        $myFolder = 'data/';
        $myFileName = 'questions';
        $fileExt = '.csv';
        $filename = $myFolder . $myFileName . $fileExt;

        if ($debug) print PHP_EOL . '<p>filename is ' . $filename;

        $file = fopen($filename, 'a');

        fputcsv($file, $dataRecord);

        fclose($file); 
        
        
        print PHP_EOL . '<!-- SECTION: 2f Create message -->' . PHP_EOL;

        $message = '<h2>Your  information.</h2>';       
        foreach ($_POST as $htmlName => $value) {
            
            $message .= '<p>';
      
            $camelCase = preg_split('/(?=[A-Z])/', substr($htmlName, 3));
            foreach ($camelCase as $oneWord) {
                $message .= $oneWord . ' ';
            }
    
            $message .= ' = ' . htmlentities($value, ENT_QUOTES, "UTF-8") . '</p>';
        }

        
        print PHP_EOL . '<!-- SECTION: 2g Mail to user -->' . PHP_EOL;
        
        $to = $email; // the person who filled out the form     
        $cc = 'rbeattie@uvm.edu';       
        $bcc = '';
        
        $from = 'GitHub Tutorial <customer.service@your-site.com>';
        
        $subject = 'Question Summited: ';
        
        
        $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);
        
    } // end form is valid   
}   // ends if form was submitted.


print PHP_EOL . '<!-- SECTION 3 Display Form -->' . PHP_EOL;
//
?>
<main>
    <article>
        <?php
        print PHP_EOL . '<!-- SECTION 3a  -->' . PHP_EOL;

        if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
            print '<h2>Thank you for providing your question.</h2>';

            print '<p>For your records a copy of this data has ';
            if (!$mailed) {    
                print "not ";         
            }
            
            print 'been sent:</p>';
            print '<p>To: ' . $email . '</p>';
    
            print $message;
        } else {       
            print '<h2>Summit a Question </h2>';
            print '<p class="form-heading">Your question will be answered quickly</p>';

            
        print PHP_EOL . '<!-- SECTION 3b Error Messages -->' . PHP_EOL;
        
        
            if ($errorMsg) {    
                print '<div id="errors">' . PHP_EOL;
                print '<h2>Your form has the following mistakes that need to be fixed.</h2>' . PHP_EOL;
                print '<ol>' . PHP_EOL;
                
                foreach ($errorMsg as $err) {
                    print '<li>' . $err . '</li>' . PHP_EOL;       
                }
                
                print '</ol>' . PHP_EOL;
                print '</div>' . PHP_EOL;
            }


        print PHP_EOL . '<!-- SECTION 3c html Form -->' . PHP_EOL;?>
        
        <form action = "<?php print $phpSelf; ?>"
              id = "frmQuestion"
              method = "post">
            <fieldset class = "contact">
                <legend>Contact Information</legend>
                <p>
                    <label class="required" for="txtName">Name</label>  
                    <input autofocus
                            <?php if ($NameERROR) print 'class="mistake"'; ?>
                            id="txtName"
                            maxlength="45"
                            name="txtName"
                            onfocus="this.select()"
                            placeholder="Enter your name"
                            tabindex="100"
                            type="text"
                            value="<?php print $name; ?>"                    
                    >                    
                </p>
                <p>
                    <label class = "required" for = "txtEmail">Email</label>
                    <input 
                        <?php if ($emailERROR) print 'class="mistake"'; ?>
                        id = "txtEmail"     
                        maxlength = "45"
                        name = "txtEmail"
                        onfocus = "this.select()"
                        placeholder = "Enter your email address"
                        tabindex = "120"
                        type = "text"
                        value = "<?php print $email; ?>"
                    >
                </p>
            </fieldset> <!-- ends contact -->
            
            <fieldset class="textarea">
                <p>
                    <label  class="required" for="txtQuestion">Question</label>
                    <textarea <?php if ($questionERROR) print 'class="mistake"'; ?>
                        id="txtQuestion" 
                        name="txtQuestion" 
                        onfocus="this.select()" 
                        tabindex="200"><?php print $question; ?></textarea>
                </p>
            </fieldset><!-- ends question area -->
            
            <fieldset  class="listbox <?php if ($language) print 'class=mistake'; ?>">
                <legend>Programming Language </legend>
                <p>
                    <select id="1stLanguage" 
                            name="1stLanguage" 
                            tabindex="520" >
                        <option <?php if ($language == "C++") print " selected "; ?>
                            value="C++">C++</option>
                        
                        <option <?php if ($language == "C#") print " selected "; ?>
                            value="C#">C#</option>
                        
                        <option <?php if ($language == "Java") print " selected "; ?>
                            value="Java">Java</option>
                        
                        <option <?php if ($language == "Javascript") print " selected "; ?>
                            value="Javascript">Javascript</option>
                        
                        <option <?php if ($language == "Html/Css") print " selected "; ?>
                            value="Html/Css">Html/Css</option>

                        <option <?php if ($language == "Pearl") print " selected "; ?>
                            value="Pearl">Pearl</option>

                        <option <?php if ($language == "Php") print " selected "; ?>
                            value="Php">Php</option>
                        
                        <option <?php if ($language == "Python") print " selected "; ?>
                            value="Python">Python</option>
                        
                        <option <?php if ($language == "Other") print " selected "; ?>
                            value="Other">Other</option>
                    </select>
                </p>
            </fieldset><!-- ends Drop down list -->
            
            <fieldset class="checkbox <?php if ($typeERROR) print ' mistake'; ?>">
                <legend>What is the question about? (choose at least one and check all that apply):</legend>
                <p>
                    <label class="check-field">
                        <input <?php if ($repository) print " checked "; ?>
                            id="chkRepositiry"
                            name="chkRepositiry"
                            tabindex="420"
                            type="checkbox"
                            value="Repository">Repository</label>
                </p>
                <p>
                    <label class="check-field">
                        <input <?php if ($pushPull) print " checked "; ?>
                            id="chkPushPull" 
                            name="chkPushPull" 
                            tabindex="430"
                            type="checkbox"
                            value="PushPull">Push Pull</label>
                </p>
                <p>
                    <label class="check-field">
                        <input <?php if ($branch) print " checked "; ?>
                            id="chkBranch" 
                            name="chkBranch" 
                            tabindex="440"
                            type="checkbox"
                            value="Branch">Branch</label>
                </p>
                <p>
                    <label class="check-field">
                        <input <?php if ($merging) print " checked "; ?>
                            id="chkMerging" 
                            name="chkMerging" 
                            tabindex="440"
                            type="checkbox"
                            value="Merging">Merging</label>
                </p>
                <p>
                    <label class="check-field">
                        <input <?php if ($other) print " checked "; ?>
                            id="chkOther" 
                            name="chkOther" 
                            tabindex="440"
                            type="checkbox"
                            value="Other">Other</label>
                </p>
            </fieldset><!-- ends check boxes -->
            
            <fieldset class="radio <?php if ($experience) print 'class=mistake'; ?>">
                <legend>What is your Git experience level?</legend>
                <p>    
                    <label class="radio-field"><input type="radio" id="radExperienceBeginner" name="radExperience" value="Beginner" tabindex="572" 
                    <?php if ($experience == "Beginner") echo ' checked="checked" '; ?>>
                        Beginner</label>
                </p>
                <p>
                    <label class="radio-field"><input type="radio" id="radExperienceIntermediate" name="radExperience" value="Intermediate" tabindex="574" 
                    <?php if ($experience == "Intermediate") echo ' checked="checked" '; ?>>
                        Intermediate</label>
                </p>
                <p>
                    <label class="radio-field"><input type="radio" id="radExperienceProficient" name="radExperience" value="Proficient" tabindex="574" 
                    <?php if ($experience == "Proficient") echo ' checked="checked" '; ?>>
                        Proficient</label>
                </p>
            </fieldset> <!-- ends radio buttons -->

            <fieldset class="buttons">
                <legend></legend>
                <input class = "button" id = "btnSubmit" name = "btnSubmit" tabindex = "900" type = "submit" value = "Sumbit" >
            </fieldset> <!-- ends buttons -->
        </form>     
<?php
    } // ends body submit
    ?>
    </article>
</main>
<?php
include ('footer.php');
?>
</body>
</html>