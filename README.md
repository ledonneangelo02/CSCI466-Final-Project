# CSCI466 Final Project

CSCI 466 Database Section: 02 Semester: Spring 2023

# Bootstrap

In order to make designing simple to use, Bootstrap has been included in order to
make it easier to design and lay out the structure of the project. The documentation
for Bootstrap is here:

https://getbootstrap.com/docs/5.3/getting-started/introduction/

Most of the features that we will use for Bootstrap are under the Layout, Content,
Forms, and Components section of Bootstrap. If you never used Bootstrap before, the
best way to use it is to copy and paste the example code and modify it to work for
what you're doing. It's generally easy to use as long as you avoid the more complicated
stuff. If you have any questions, contact Chris.

# Design Documentation

### **Navigation Bar** components/navbar.php

Provides navigation around the website.

# API Documentation

Below are some utilities and help functions that will be useful for development.

### [ Chris ] **databaseEstablishConnection** 

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

