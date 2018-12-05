<?php
include ('top.php');
?>
<article> 
    <h2>Pull requests and commits</h2>
    <p>Now that it’s known how to make a repository as well as branches, it’s like to learn how to make edits. Edits in GitHub are done through commits. A commit is a saved change made to a repository. Once many edits have been made to a webpage, the programmer will send out a special request called a pull request, to see if the changes are good enough to merge the two branches. There will be more information on this below.</p>       
    <h3>Committing Changes</h3>
    <p>As said before, commits are saved changes to a repository. Each commit will come with a commit message. This is used to document and give a description of the nature of the change made. This is done so other contributors are see why the change was made. Once a commit has been made to a branch, it will no longer contain the same information as the branches master branch. </p>
    <h4>Hot to commit changes</h4>
    <ul>
        <li>First you go to your repository’s page</li>
        <li>Then you select the file that you want to edit</li>
        <li>
            <figure class="pull">
                <img alt="" src = "images/pull1.jpg">
                <figcaption></figcaption>
            </figure>
        </li>
        <li>after opening the file, you click of the pencil icon on the top right of the tools bar</li>
        <li>
            <figure class="pull">
                <img alt="" src = "images/pull2.jpg">
                <figcaption></figcaption>
            </figure>
        </li>
        <li>From here you can edit the file as you wish</li>
        <li>You name the commit and give the description at the bottom of the page</li>
        <li>
            <figure class="pull">
                <img alt="" src = "images/pull3.jpg">
                <figcaption></figcaption>
            </figure>
        </li>
        <li>once both boxes are full you click the green “commit changes button and the commit has been made</li>
    </ul>
    <h5>Pull requests</h5>
    <p>Pull requests are how a programmer makes his edits finial. When you open a pull request your requesting that the changes you have make to files in a branch are good enough to be merged back to the master branch. Pull request will also show the changes between different branches. And new additions to a branch will be highlighted in green and any differences or code that was removed will be highlighted in red. Once you have made added all the required comment and have opened a pull request, you can use GitHub’s @mention system to contact other contributors to see if they’re able to review your changes. Reviewing changes before branches are merged is a great way to regulate large scale projects. Specifically, it’s a great tool for project managers to monitor all changes made to a project. It’s also a good way to keep all members of a team up to date with all the changes made to the project.</p>
    <h6>How to Merge two branches</h6>
    <ul>    
        <li>first you go to the main page of your repository and click on the “pull requests” tab in the middle of the navigation bar </li>
        <li>
            <figure class="pull">
                <img alt="" src = "images/pull4.jpg">
                <figcaption></figcaption>
            </figure>
        </li>
        <li>Then you are brought to a new page that gives you the history of pervious Pull requests as well as the option to create a new Pull request</li>
        <li>Click on “New Pull Request”</li>
        <li>
            <figure class="pull">
                <img alt="" src = "images/pull5.jpg">
                <figcaption></figcaption>
            </figure>
        </li>
        <li>Form here you have two drop down menus where you select the two branches you want to merge</li>
        <li>After that you will be able to see all the difference there are between the two branches</li>
        <li>Finally click “create pull request” to make the request</li>
        <li>
            <figure class="pull">
                <img alt="" src = "images/pull6.jpg">
                <figcaption></figcaption>
            </figure>
        </li>
    </ul>
</article>
<?php
include ('footer.php');
?>
</body>
</html>
