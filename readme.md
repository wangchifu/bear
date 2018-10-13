# BEAR 學籍系統
- 旨在建立一套符合國中小學籍成績管理的電子化系統，自由開放，本系統以 MIT 授權開放。
- 介面參考自 sfs 3.1 ，sfs 是一套由基層老師自發性發展的學籍系統，全國近半縣市國中小學使用它。
- 本系統使用 PHP 框架 Laravel 5.7 建立。

## 安裝
### 系統需求：php 7.2 以上，ubuntu 16.04 以上。
- php7.2 安裝請參考 https://blog.johnsonlu.org/install-or-upgrade-php-7-2-on-ubuntu/
- php 套件
<br>
sudo apt-get install php7.2-cli php7.2-json php7.2-mbstring php7.2-gd php7.2-xml php7.2-ldap php7.2-mysql php7.2-curl
- 安裝 git
<br>
sudo apt-get install git

- 安裝 composer
<br>
wget -c https://getcomposer.org/composer.phar
<br>
chmod +x composer.phar
<br>
sudo mv composer.phar /usr/local/bin/composer

- 安裝解壓縮
<br>
sudo apt-get install unzip zip

### 下載及設定
- 複製
git clone https://www.github.com/wangchifu/bear.git

- 安裝 vendor 目錄
<br>
cd bear
<br>
composer install 

- 做 .env 設定檔
<br>
cp .env.example .env

- 產生 key
<br>
php artisan key:generate

- 修改 .env 檔
<br>
vim .env
<br>
APP_NAME=Laravel  //網站名字
<br>
...
<br>
DB_DATABASE=homestead  //資料庫名稱
<br>
DB_USERNAME=homestead  //資料庫使用者
<br>
DB_PASSWORD=secret  //資料庫使用者密碼
<br>
...
<br>
DEFAULT_USER_PWD=demo1234 //網站使用者預設密碼

- 設定下載目錄及暫存目錄權限為777
<br>
sudo chmod 777 -R storage bootstrap/cache

- 隱藏index.php，重啟apache2
<br>
sudo a2enmod rewrite
<br> 
sudo service apache2 restart

### 開新資料庫
- 如 .env 設定，新增一個資料庫(亦可使用phpMyAdmin)
mysqladmin -u使用者 -p create 資料庫名

- 造資料表
cd bear
<br>
php artisan migrate

- 建啟始值(注意，此指令僅能使用一次，否則會清空資料庫)
php artisan db:seed 

### 修改 apache 設定，將網站根目錄指到 bear/public，你最好有一個 domain name
- 建立設定檔，請參考底下修改成自己系統的
sudo vim /etc/apache2/sites-available/bear.conf
<br>
<VirtualHost *:80><br>
        ServerName bear.localhost<br>
        DocumentRoot /var/www/html/bear/public<br>
      <Directory /var/www/html/bear/public><br>
        AllowOverride All<br>
        </Directory><br>
</VirtualHost>
