0.0.0.0 https://account.jetbrains.com:443
0.0.0.0 http://www.jetbrains.com
0.0.0.0 account.jetbrains.com
1.2.3.4 account.jetbrains.com
1.2.3.4 http://www.jetbrains.com
1.2.3.4 www-weighted.jetbrains.com

127.0.0.1       localhost
127.0.0.1       cms.off
127.0.0.1       blog.off
127.0.0.1       larahack.off
127.0.0.1       vlog.off
127.0.0.1       food.off
127.0.0.1       laramap.off
127.0.0.1       konarfoods.off
127.0.0.1       tracknsecure.off
127.0.0.1       elygom.off
127.0.0.1       elygomapp.off
127.0.0.1       eaglepattern.off
127.0.0.1       ogolo.off
127.0.0.1 	konarfoods.test
127.0.0.1 	jicafimo.test
127.0.0.1 	bloomzoon.test
127.0.0.1 	wizapay.test
127.0.0.1 	bloomzon.test
127.0.0.1 	bloomz.test
127.0.0.1 	wixapay.test
127.0.0.1 	paystacktest.test
127.0.0.1 	ojarh.test
127.0.0.1 	sms.test
127.0.0.1 	police.test




































<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost>


<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/cms/public"
    ServerName cms.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/blog/public"
    ServerName blog.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/larahack/public"
    ServerName larahack.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/vlog/public"
    ServerName vlog.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/food_project/public"
    ServerName food.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/laramap/public"
    ServerName laramap.off
</VirtualHost>

#<VirtualHost *:80>
#    DocumentRoot "C:/xampp/htdocs/konarfoods/public"
#    ServerName konarfoods.off
#</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/track_n_secure/public"
    ServerName tracknsecure.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/elygom/public"
    ServerName elygom.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/elygom/public"
    ServerName elygomapp.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/eagle_pattern/public"
    ServerName eaglepattern.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/ogolo/public"
    ServerName ogolo.off
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/jicafimo/public"
    ServerName jicafimo.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/bloomzoon_app/public"
    ServerName bloomzoon.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/wizapay/public"
    ServerName wizapay.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/boomzon/public"
    ServerName bloomzon.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/boomzon-web/public"
    ServerName bloomz.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/wixapay/public"
    ServerName wixapay.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/paystacktest/public"
    ServerName paystacktest.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/ojarh/public"
    ServerName ojarh.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/sms/public"
    ServerName sms.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/police/public"
    ServerName police.test
</VirtualHost>





























## konarfoods.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/konarfoods/public"
     ServerName konarfoods.test
     ServerAlias *.konarfoods.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/konarfoods/public"
     ServerName konarfoods.test
     ServerAlias *.konarfoods.test
     SSLEngine on
     SSLCertificateFile "crt/konarfoods.test/server.crt"
     SSLCertificateKeyFile "crt/konarfoods.test/server.key"
 </VirtualHost>

## jicafimo.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/jicafimo/public"
     ServerName jicafimo.test
     ServerAlias *.jicafimo.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/jicafimo/public"
     ServerName jicafimo.test
     ServerAlias *.jicafimo.test
     SSLEngine on
     SSLCertificateFile "crt/jicafimo.test/server.crt"
     SSLCertificateKeyFile "crt/jicafimo.test/server.key"
 </VirtualHost>


## bloomzoon.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/bloomzoon_app/public"
     ServerName bloomzoon.test
     ServerAlias *.bloomzoon.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/bloomzoon_app/public"
     ServerName bloomzoon.test
     ServerAlias *.bloomzoon.test
     SSLEngine on
     SSLCertificateFile "crt/bloomzoon.test/server.crt"
     SSLCertificateKeyFile "crt/bloomzoon.test/server.key"
 </VirtualHost>


## wizapay.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/wizapay/public"
     ServerName wizapay.test
     ServerAlias *.wizapay.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/wizapay/public"
     ServerName wizapay.test
     ServerAlias *.wizapay.test
     SSLEngine on
     SSLCertificateFile "crt/wizapay.test/server.crt"
     SSLCertificateKeyFile "crt/wizapay.test/server.key"
 </VirtualHost>

## bloomzon.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/bloomzon/public"
     ServerName bloomzon.test
     ServerAlias *.bloomzon.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/bloomzon/public"
     ServerName bloomzon.test
     ServerAlias *.bloomzon.test
     SSLEngine on
     SSLCertificateFile "crt/bloomzon.test/server.crt"
     SSLCertificateKeyFile "crt/bloomzon.test/server.key"
 </VirtualHost>

## bloomz.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/bloomzon-web/public"
     ServerName bloomz.test
     ServerAlias *.bloomz.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/bloomzon-web/public"
     ServerName bloomz.test
     ServerAlias *.bloomz.test
     SSLEngine on
     SSLCertificateFile "crt/bloomz.test/server.crt"
     SSLCertificateKeyFile "crt/bloomz.test/server.key"
 </VirtualHost>

## wixapay.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/wixapay/public"
     ServerName wixapay.test
     ServerAlias *.wixapay.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/wixapay/public"
     ServerName wixapay.test
     ServerAlias *.wixapay.test
     SSLEngine on
     SSLCertificateFile "crt/wixapay.test/server.crt"
     SSLCertificateKeyFile "crt/wixapay.test/server.key"
 </VirtualHost>

## paystacktest.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/paystacktest/public"
     ServerName paystacktest.test
     ServerAlias *.paystacktest.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/paystacktest/public"
     ServerName paystacktest.test
     ServerAlias *.paystacktest.test
     SSLEngine on
     SSLCertificateFile "crt/paystacktest.test/server.crt"
     SSLCertificateKeyFile "crt/paystacktest.test/server.key"
 </VirtualHost>

## ojarh.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/ojarh/public"
     ServerName ojarh.test
     ServerAlias *.ojarh.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/ojarh/public"
     ServerName ojarh.test
     ServerAlias *.ojarh.test
     SSLEngine on
     SSLCertificateFile "crt/ojarh.test/server.crt"
     SSLCertificateKeyFile "crt/ojarh.test/server.key"
 </VirtualHost>

## sms.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/sms/public"
     ServerName sms.test
     ServerAlias *.sms.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/sms/public"
     ServerName sms.test
     ServerAlias *.sms.test
     SSLEngine on
     SSLCertificateFile "crt/sms.test/server.crt"
     SSLCertificateKeyFile "crt/sms.test/server.key"
 </VirtualHost>

## police.test
 <VirtualHost *:80>
     DocumentRoot "C:/xampp/htdocs/police/public"
     ServerName police.test
     ServerAlias *.police.test
 </VirtualHost>
 <VirtualHost *:443>
     DocumentRoot "C:/xampp/htdocs/police/public"
     ServerName police.test
     ServerAlias *.police.test
     SSLEngine on
     SSLCertificateFile "crt/police.test/server.crt"
     SSLCertificateKeyFile "crt/police.test/server.key"
 </VirtualHost>

























