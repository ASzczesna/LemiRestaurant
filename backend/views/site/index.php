<?php

/* @var $this yii\web\View */

$this->title = 'LR backend';

?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Here's the backroom of restaurant:</h2>
<!--próba wyświetlenia danych w sposób analogiczny do menu we frontendzie nie działa-->
<!--        <?//= $data; ?>-->
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h3>Dishes</h3>
                <p class="text-justify">Create, read, edit or delete dish items. These are used to display menu page.
                    (ID, Name, Description, Price, ID Category)
                </p>
                <p class="text-center"><a class="btn btn-lg btn-default" href="/dishes">Go &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h3>Categories</h3>
                <p class="text-justify">Create, read, edit or delete category items. These are used to display menu page.
                    (ID, Name)
                </p>
                <p class="text-center"><a class="btn btn-lg btn-default" href="/categories">Go &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h3>Users</h3>
                <p class="text-justify">Create, read, edit or delete users.
                    (ID, Username, First name, Last name, Password, Email)
                </p>
                <p class="text-center"><a class="btn btn-lg btn-default" href="/user">Go &raquo;</a></p>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <h3>Emails</h3>
                <p class="text-justify">Create, read, edit or delete emails from visitors. (ID, Sender name, Sender email, Subject, Content, Note)
                </p>
                <p class="text-center"><a class="btn btn-lg btn-default" href="/emails">Go &raquo;</a></p>
            </div>
        </div>
        <br>

        <div class="row ">
            <div class="col-lg-4">
                <h3>Permission types</h3>
                <p class="text-justify">Create, read, edit or delete authorization types. (Name, Type, Description)
                </p>
                <p class="text-center"><a class="btn btn-lg btn-default" href="/auth-item">Go &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h3>Permissions combination</h3>
                <p class="text-justify">Create, read, edit or delete parent- and sub-types of permissions.
                    (Parent, Child)
                </p>
                <p class="text-center"><a class="btn btn-lg btn-default" href="/auth-item-child">Go &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h3>Permission assignment</h3>
                <p class="text-justify">Add, read, edit or delete users permissions. (Item name, User ID)
                </p>
                <p class="text-center"><a class="btn btn-lg btn-default" href="/auth-assignment">Go &raquo;</a></p>
            </div>
        </div>
    </div>
</div>




