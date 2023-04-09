# CSCI466-Final-Project
CSCI 466 Database Section: 02 Semester: Spring 2023

## Chris-Framework Documentation

Below are some utilities and help functions that will be useful for development.

### **databaseEstablishConnection**

```php
function
databaseEstablishConnection($database, $username, $password)
{ ... }
```

This will automatically establish a connection to MariaDB and enable warnings on
a successful connection. The implementation is already defined in `index.php`, so
you can use that as areference. In order to use this properly, either manually
provide the arguments, or preferably define them in a file called `utils/db_creds.php`
so that they aren't exposed in the file. This file will automatically be ignored when
adding through Git.

