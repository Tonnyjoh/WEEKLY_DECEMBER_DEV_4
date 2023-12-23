# WEEKLY_DECEMBER_DEV_4
Rename your file to Week_4.
We should have Week_4\index.php etc.
# 
In yourpath\htdocs\Week_4\PHP\connexionbase.php, www in Mamp
edit @yourname and @yourpassword respectively.
# 
To copy
  CREATE DATABASE week4;
  USE Week4;
  CREATE TABLE shortUrl (
    id INT AUTO_INCREMENT PRIMARY KEY,
    long_url VARCHAR(255) NOT NULL,
    short_url VARCHAR(50) NOT NULL UNIQUE,
    custom_alias VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
# 
Launch your server ;)
http://localhost/Week_4/index.php
