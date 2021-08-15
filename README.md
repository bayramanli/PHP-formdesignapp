# PHP-formdesignapp
PHP ile formbuilderjs kullanılarak yapılan online form tasarım uygulamasıdır.
![Form Tasarım Uygulaması](https://github.com/bayramanli/PHP-formdesignapp/blob/master/formdesignapp.PNG)

### Veritabanı bağlantısı ve bilgileri
Veritabanı bağlantısı için ```classes/database.php``` dosyasında, aşağıdaki bilgiler düzenlenmelidir.

```php
    private $dbhost = "localhost"; // sunucu adı
    private $dbuser = "username"; // veritabanı kullanıcı adı
    private $dbpass = "password"; // şifre
    private $dbname = "db_name"; // veritabanı adı
```
