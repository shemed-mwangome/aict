AICT

1. Unzip aict.zip into C:\xamp\apache\htdocs
2. go to "c:\xamp\aict\src\config.php"
3. Open it and change following line as follows

    ------------------------------
    define('DB_USER', 'db_admin');
    define('DB_PASSWORD', '2uyDWuy/HW4dp+m');

    change them into this

    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    --------------------------------------

4. then go to c:\xampp\mysql\bin
5. Press shift + right click in that folder when context menu appear choose open cmd/pwershell here
6. Then enter the following
    mysql -u root -p < c:\xampp\htdocs\aict\database\aict.sql

when it asks for password press enter.... it will import the database, if it is successfull no error will be displayed

7. Then open browser and visit localhost/aict/
