<!-- ///////////////////////////   Nav   /////////////////////////// -->
<nav>
    <ol>
        <?php
        
        print '<li class="';
        if ($path_parts['filename'] == "index") {
            print ' activePage ';
        }
        print '">';
        print '<a href="index.php">Home</a>';
        print '</li>';
        
        print '<li class="';
        if ($path_parts['filename'] == "tutorial") {
            print ' activePage ';
        }
        print '">';
        print '<a href="tutorial.php">Tutorial</a>';
        print '</li>';   
        
        print '<li class="';
        if ($path_parts['filename'] == "form") {
            print ' activePage ';
        }
        print '">';
        print '<a href="form.php">Form</a>';
        print '</li>'; 
        ?>
    </ol>
    <?php $page = "Home"; 
          $currentPage = $page;
    ?>
        <p>
            <select id="lstPage" 
                    name="lstPage" 
                    tabindex="520" >
                <option <?php if ($page == "Home") print " selected "; ?>
                    value="Home"> Home</option> 

                <option <?php if ($page == "Tutorial") print " selected "; ?>
                    value="Tutorial"> Tutorial</option>
                
                <option <?php if ($page == "Form") print " selected "; ?>
                    value="Form"> Form</option>
                
            </select>
        </p>
        <p>
            
            <select id="lstSomething" 
                    name="lstSomething" 
                    tabindex="520" >
                <option <button type="submit" formtarget="index.php">Home</option> 
                <option <button type="submit" formtarget="tutorial.php">Tutorial</option> 
                <option <button type="submit" formtarget="form.php">Form</option> 
            </select>
        </p>
    <?php if($page != $currentPage) ?>
     
</nav>
