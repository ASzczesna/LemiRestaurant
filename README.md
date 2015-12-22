How to prepare Yii advance template project, configure Apache server and git:

1. Install git and clone repo in the most suitable way for you (console, Source Tree etc.)

2. Apache is already installed but you'll also need PHP and MySQL so type:
        sudo apt-get install php5
        sudo apt-get install php5-mysql

3. Download Yii project files (from file archive or by Composer - details in http://www.yiiframework.com/doc-2.0/guide-start-installation.html) and put them (unpacked) into repository folder.

4. Type init command:
        php /path/to/yii/app/init
    and choose "development"/"0"

5. Adjust database configuration in yiiapp/common/config/main-local.php (host, db name, user, password)

6. In main folder of the app type:
        ./yii migrate
    to prepare the database.

7. Configure /etc/apache2/apache2.config by adding:
        <Directory /path/to/yii/app/frontend/web/>
            Options Indexes FollowSymLinks
            AllowOverride None
            Require all granted
        </Directory>

        <Directory /path/to/yii/app/backend/web/>
            Options Indexes FollowSymLinks
            AllowOverride None
            Require all granted
        </Directory>

    and in the last line:

        ServerName localhost

8. Configure /etc/apache2/sites-enabled/000-default.conf - change whole content to:
        <VirtualHost *:80>
        	ServerName frontend.dev
        	ServerAdmin root@localhost
        	DocumentRoot "/path/to/yii/app/frontend/web"

               <Directory "/path/to/yii/app/frontend/web">
                   # use mod_rewrite for pretty URL support
                   RewriteEngine on
                   # If a directory or a file exists, use the request directly
                   RewriteCond %{REQUEST_FILENAME} !-f
                   RewriteCond %{REQUEST_FILENAME} !-d
                   # Otherwise forward the request to index.php
                   RewriteRule . index.php

                   # use index.php as index file
                   DirectoryIndex index.php

                   # ...other settings...
               </Directory>

        	ErrorLog ${APACHE_LOG_DIR}/error.log
        	CustomLog ${APACHE_LOG_DIR}/access.log combined
        </VirtualHost>


        <VirtualHost *:80>
        	ServerName backend.dev
        	ServerAdmin root@localhost
        	DocumentRoot "/path/to/yii/app/backend/web"

               <Directory "/path/to/yii/app//backend/web">
                   # use mod_rewrite for pretty URL support
                   RewriteEngine on
                   # If a directory or a file exists, use the request directly
                   RewriteCond %{REQUEST_FILENAME} !-f
                   RewriteCond %{REQUEST_FILENAME} !-d
                   # Otherwise forward the request to index.php
                   RewriteRule . index.php

                   # use index.php as index file
                   DirectoryIndex index.php

                   # ...other settings...
               </Directory>

        	ErrorLog ${APACHE_LOG_DIR}/error.log
        	CustomLog ${APACHE_LOG_DIR}/access.log combined
        </VirtualHost>

9.Type :
        sudo a2enmod rewrite
    to enable rewrite engine.

10. Open /etc/hosts as root and add lines:
        127.0.0.1 frontend.dev
        127.0.0.1 backend.dev

11. To check if all the requirements are conformed open /path/to/yii/app/requirements.php and change the 14th line to
        $frameworkPath = dirname(__FILE__) . '/../../vendor/yiisoft/yii2/';
    and then copy this file to /frontend/web folder. Check it by opening frontend.dev/requirements.php in browser.


        <?= $form->field($model, 'idcategory')->dropDownList(
            ArrayHelper::map(Categories::find()->all(), 'idcategory', 'name'),
            ['prompt' => 'Select category']
        )?>