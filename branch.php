<?php
include ('top.php');
?>
<article> 
    <h2>Final Project branch</h2>
    <h3>What is a branch:</h3>
    <p>Branches are an easy way to make changes to repositories. Each repository has a master branch. Branching is a way to make changes or edits to the repository by making a copy of the master branch. Anytime you make a branch off the master branch, you’re creating an exact copy of the master branch as a new branch. On this new branch you’re able to make edits without changing anything on the original master branch. If you have any experience with coding, then you’ve probably made copies of files to edit them. For example, if you have a project called “project.exe” then you’ve probably made a copy called something like “project-edit.exe” so that you can test new features without making changes to the original. Branching is very similar to creating copies of files, but it’s a much easier and automated process.</p>
    <h4>Things to remember:</h4>
    <p>Branching is a very important practice when using GitHub. All your projects flow on GitHub is dependent on branching. This makes it even more important to name your branches in such a way that they’re very descriptive towards their purpose. For example, if you have one branch that contains a repository that gets some input form a user and processes it called “get-input-process” and you want to try to add some kind of authentication, then you would most likely want to call the new branch, “get-input-process-authentication-edit”. Branches are also a very good way to fix bugs. If your master branch is having any issues than you can create a copy and play around with the copy to try and fix the errors.</p>
    <h5>Protected Branches:</h5>
    <p>Repository administrators can protect branches. This means that the admin can put certain restrictions on a branch that prevent users from deleting for force pushing a branch (learn more about push and pull requests on our Pull request sections). The purpose of this is to enforce certain workflows on repositories before they are merged. Protecting a branch gives the admin many different options for regulating how different programmers can push pull form a branch. Admins can require reviews on merge requests as well as frequent status checks on a branch. You won’t be able to merge a branch until all the requirements from a status check or review are made. You also won’t be able to push and commits to the branch unless they are signed or verified.</p>
    <h6>How to create a branch: </h6>
    <ul>
        <li>At the main page of your repository, click on the branch selector drop-down menu</li>
        <li>
            <figure class="branch">
                <img alt="" src = "images/branch1.jpg">
                <figcaption></figcaption>
            </figure>
        </li>
        <li>Then you simple enter a unique name to your name</li>
        <li>be sure that the name is also descriptive of that branches purpose</li>
        <li>Then hit enter</li>
    </ul>
    <h7>Deleting a branch:</h7>
    <ul>
        <li>Go to the main page of your repository and click on the branch list of branches at the top navigation bar</li>
        <li>
            <figure class="branch">
                <img alt="" src = "images/branch2.jpg">
                <figcaption></figcaption>
            </figure>
        </li>
        <li>click on “branches” and you will be brought to your list of branches</li>
        <li>From here click the red trash can item next to the option to make a new repository</li>
        <li>
            <figure class="branch">
                <img alt="" src = "images/branch3.jpg">
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
