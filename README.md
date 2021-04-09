# Requirements
Ubuntu 18.04+
Code Igniter 4+
Python 3.6+
Wordpress 5+
Nginx
# Why I write this code?
## 1, My WP site is slow
When I decided to write this, my Wordpress' website is slow. When I build a shop, use Flatsome as main theme, it's too slow. And the website keeps loading all the unneccessary stuffs, from Plugins and Themes, and Wordpress stuffs. That make the web loads slow (I think so).

## 2, My website crash when update post / product

When I open a few tabs, to update Products, and Blog posts, my Wordpress website loaded very very slow, and it crashed. And then, it affected the webpage that customers see. Admin page is crashed, and other pages is crashed, too.

## 3, Want to try something new

So I want to try something new, ah maybe it's not new ... Use Wordpress to save data, and create a theme that show only data I want, then, use Python to crawl that, save to txt or json file, store it (I dont want to create a new Database or new Table, because that's not funny). 

## 4, My hosting don't have enough resource

One big reason why I want to seperate Wordpress -> data, and data -> CI -> website, is: My hosting is kind of suck, because it's cheap =)))). But when seperate write and read data, Write data -> Wordpress, Read data -> CI, it's really fast. And I don't have to worry about update products cause web crashing. Because it's seperated, and Wordpress site doesnt have to install alot of plugins anymore.

***NOTE:*** You can use WP Rocket, Autoptimize to speed up the website, it's good, and website loads really fast. You can try to use those plugins, and you dont need to switch to CodeIgniter... 

The website here: daquyanan.com
It's pretty fast.
# How to use
## Step 1: Migrate Wordpress site to subdomain
Let's assume that you have a domain: example.com that installed Wordpress.
Now you will migrate all wordpress site to subdomain, for eg: wp.example.com
## Step 2: Create CodeIgniter website
For example, you have folder **htdocswp** -> Wordpress code, and **htdocsci** -> CI code, those 2 folders in same directory.
Config nginx: wp.example.com -> htdocswp and example.com -> htdocsci
Because I want to use both Wordpress and CodeIgniter, so I seperate them into 2 folder / 2 web.

## Step 3: Move Wordpress uploads folder to CodeIgniter Public folder
Because I want to use all Wordpress utilities, media libraries, editor,... so I move Wordpress uploads folder to CI public folder, and then re-define the Path of that folder. Then, Wordpress will upload file, image in to that folder, and other function work like nothing change!

`htdocswp / wp-content / uploads -> htdocsci / public / wp-content / uploads`

(Because I still use some Wordpress plugins function, I checked and copy necessary css/js file in Wordpress plugins folder. )

## Step 4: Re-define Uploads folder for Wordpress

Find **upload_path** in wp_options table -> change it's value to `../htdocsci/public/wp-content/uploads`
Find **upload_url_path** in wp_options table -> change it's value to
`https://example.com/wp-content/uploads`

Notice that change example.com to yourdomain
 
## Step 5: Upload theme wpshowdata and Activate it
 
 I create this theme to get all infomation I need, product, blogpost, page, category, product attribute,... So, it may not fit your need. Create a theme youself !
Notice that, in functions.php file, there is a function to push notification to my phone, by Telegram bot, whenever customers buy a product!

## Step 6: Copy Data folder to CI app folder

Copy Data folder. 
Setup the ENV file, the password -> the password that you set before, in theme file (yourpasswordhere)
The main.py file -> get all data. You should run in terminal: `python3 main.py` to crawl all data. The main2.py, is used for submit each product/post, it will crawl only that product/post and category that has product/post.


**Note**: If you want to use Ajax (Woocommerce Cart function, etc), add 
`header("Access-Control-Allow-Origin: https://domain.com");`
to **wp-admin/admin-ajax.php**

Forder Structure:
htdocswp
****wp-content
********themes
************wpshowdata
****wp-admin
********admin-ajax.php
htdocsci
****app
********Data
****public
********wp-content



