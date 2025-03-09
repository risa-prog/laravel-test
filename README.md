#### お問い合わせフォーム

**環境構築**

Dockerビルド<br/>
1,git clone  git@github.com:coachtech-material/laravel-docker-template.git<br/>
2,docker-compose up -d --build

Laravel環境構築<br/>
1,docker-compose exec php bash<br/>
2,composer install<br/>
3,.env.exampleファイルから.envを作成し、環境変数を変更<br/>
4,php artisan key:generate<br/>
5,php artisan migrate<br/>
6,php artisan db:seed<br/>

**使用技術**

•PHP 7.4<br/>
•Laravel 8.83<br/>
•MySQL 8.0<br/>

**ER図**


**URL**
