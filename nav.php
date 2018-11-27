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
        ?>
    </ol>
    <?php $page = "Home"; ?>
    <fieldset  class="listbox">
                <legend>Page</legend>
                <p>
                    <select id="lstPage" 
                            name="lstPage" 
                            tabindex="520" >
                        <option <?php if ($page == "Home") print " selected "; ?>
                            value="Vanilla"> Home</option>

                        <option <?php if ($page == "Tutorial") print " selected "; ?>
                            value="Chocolate"> Tutorial</option>
                    </select>
                </p>
            </fieldset><!-- ends Drop down list -->
</nav>
