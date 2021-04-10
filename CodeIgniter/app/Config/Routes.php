<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/tim-kiem/(:any)', 'Blog::search/$1');
$routes->get('/cua-hang/', 'Blog::shop');
$routes->addRedirect('/blog/(:any)', 'https://daquyanan.com');


helper('func');

$route_array = getRouteData();

foreach ($route_array as $key => $value)
	{
		$routes->get($key, getRightData($value));
	}


$routes->addRedirect('/tuyen-dung-nhan-su-thang-8-nhan-vien-cham-soc-khach-hang/', 'https://daquyanan.com/tuyen-dung/tuyen-dung-nhan-su-thang-8-nhan-vien-cham-soc-khach-hang/', 301);
$routes->addRedirect('/tuyen-dung-thang-8-nhan-vien-giao-hang/', 'https://daquyanan.com/tuyen-dung/tuyen-dung-thang-8-nhan-vien-giao-hang/', 301);
$routes->addRedirect('/tuyen-dung-thang-8-nhan-vien-marketing/', 'https://daquyanan.com/tuyen-dung/tuyen-dung-thang-8-nhan-vien-marketing/', 301);
$routes->addRedirect('/da-cam-thach/', 'https://daquyanan.com/da-quy/da-cam-thach/', 301);
$routes->addRedirect('/da-tourmaline/', 'https://daquyanan.com/da-quy/da-tourmaline/', 301);
$routes->addRedirect('/da-ruby/', 'https://daquyanan.com/da-quy/da-ruby/', 301);
$routes->addRedirect('/cach-tang-may-man-cho-ban-than-va-gia-dinh/', 'https://daquyanan.com/phong-thuy/cach-tang-may-man-cho-ban-than-va-gia-dinh/', 301);
$routes->addRedirect('/bloodstone/', 'https://daquyanan.com/da-quy/bloodstone/', 301);
$routes->addRedirect('/da-carnelian/', 'https://daquyanan.com/da-quy/da-carnelian/', 301);
$routes->addRedirect('/da-kunzite/', 'https://daquyanan.com/da-quy/da-kunzite/', 301);
$routes->addRedirect('/da-celestine/', 'https://daquyanan.com/da-quy/da-celestine/', 301);
$routes->addRedirect('/da-jasper/', 'https://daquyanan.com/da-quy/da-jasper/', 301);
$routes->addRedirect('/da-long-cong-malachite/', 'https://daquyanan.com/da-quy/da-long-cong-malachite/', 301);
$routes->addRedirect('/da-mat-trang-moonstone/', 'https://daquyanan.com/da-quy/da-mat-trang-moonstone/', 301);
$routes->addRedirect('/da-serpentine/', 'https://daquyanan.com/da-quy/da-serpentine/', 301);
$routes->addRedirect('/da-moissanite/', 'https://daquyanan.com/da-quy/da-moissanite/', 301);
$routes->addRedirect('/ngoc-bich-nephrite/', 'https://daquyanan.com/da-quy/ngoc-bich-nephrite/', 301);
$routes->addRedirect('/tap-yoga-dung-da-quy-gi-tang-hieu-qua/', 'https://daquyanan.com/da-quy/tap-yoga-dung-da-quy-gi-tang-hieu-qua/', 301);
$routes->addRedirect('/vi-tri-dat-da-quy-de-mang-lai-nang-luong-phong-thuy-tot/', 'https://daquyanan.com/phong-thuy/vi-tri-dat-da-quy-de-mang-lai-nang-luong-phong-thuy-tot/', 301);
$routes->addRedirect('/da-kyanite/', 'https://daquyanan.com/da-quy/da-kyanite/', 301);
$routes->addRedirect('/tai-sao-ngoc-tac-thu-cong-lai-gia-tri-hon-tac-tu-dong-bang-may/', 'https://daquyanan.com/da-quy/tai-sao-ngoc-tac-thu-cong-lai-gia-tri-hon-tac-tu-dong-bang-may/', 301);
$routes->addRedirect('/da-larimar/', 'https://daquyanan.com/da-quy/da-larimar/', 301);
$routes->addRedirect('/yeu-to-dinh-gia-gia-tri-ngoc/', 'https://daquyanan.com/da-quy/yeu-to-dinh-gia-gia-tri-ngoc/', 301);
$routes->addRedirect('/da-xa-cu-labradorite/', 'https://daquyanan.com/da-quy/da-xa-cu-labradorite/', 301);
$routes->addRedirect('/da-moldavite/', 'https://daquyanan.com/da-quy/da-moldavite/', 301);
$routes->addRedirect('/da-onyx/', 'https://daquyanan.com/da-quy/da-onyx/', 301);
$routes->addRedirect('/da-topaz/', 'https://daquyanan.com/da-quy/da-topaz/', 301);
$routes->addRedirect('/9-loai-da-quy-may-man-dem-lai-nang-luong-tich-cuc-ban-nen-biet/', 'https://daquyanan.com/phong-thuy/9-loai-da-quy-may-man-dem-lai-nang-luong-tich-cuc-ban-nen-biet/', 301);
$routes->addRedirect('/da-vang-gam-pyrite/', 'https://daquyanan.com/da-quy/da-vang-gam-pyrite/', 301);
$routes->addRedirect('/da-dao-hoa-rhdochrosite/', 'https://daquyanan.com/da-quy/da-dao-hoa-rhdochrosite/', 301);
$routes->addRedirect('/da-morganite/', 'https://daquyanan.com/da-quy/da-morganite/', 301);
$routes->addRedirect('/da-peridot/', 'https://daquyanan.com/da-quy/da-peridot/', 301);
$routes->addRedirect('/da-sodalite/', 'https://daquyanan.com/da-quy/da-sodalite/', 301);
$routes->addRedirect('/da-sugilite/', 'https://daquyanan.com/da-quy/da-sugilite/', 301);
$routes->addRedirect('/cach-dat-ty-huu-trong-nha-de-kich-hoat-tai-loc/', 'https://daquyanan.com/phong-thuy/cach-dat-ty-huu-trong-nha-de-kich-hoat-tai-loc/', 301);
$routes->addRedirect('/da-tanzanite/', 'https://daquyanan.com/da-quy/da-tanzanite/', 301);
$routes->addRedirect('/da-mat-troi-sunstone/', 'https://daquyanan.com/da-quy/da-mat-troi-sunstone/', 301);
$routes->addRedirect('/da-tectit/', 'https://daquyanan.com/da-quy/da-tectit/', 301);
$routes->addRedirect('/phi-thuy-lao-khanh-chung-la-gi/', 'https://daquyanan.com/da-quy/phi-thuy-lao-khanh-chung-la-gi/', 301);
$routes->addRedirect('/hien-tuong-da-sac-pleochroism/', 'https://daquyanan.com/da-quy/hien-tuong-da-sac-pleochroism/', 301);
$routes->addRedirect('/deo-da-phong-thuy-co-tot-khong/', 'https://daquyanan.com/phong-thuy/deo-da-phong-thuy-co-tot-khong/', 301);
$routes->addRedirect('/da-ngoc-lam-turquoise/', 'https://daquyanan.com/da-quy/da-ngoc-lam-turquoise/', 301);
$routes->addRedirect('/tuoi-dan-mao-tuat-co-nen-deo-ty-huu-khong/', 'https://daquyanan.com/phong-thuy/tuoi-dan-mao-tuat-co-nen-deo-ty-huu-khong/', 301);
$routes->addRedirect('/ngoc-de-quang-chrysoprase/', 'https://daquyanan.com/da-quy/ngoc-de-quang-chrysoprase/', 301);
$routes->addRedirect('/da-thach-anh/', 'https://daquyanan.com/da-quy/da-thach-anh/', 301);
$routes->addRedirect('/thach-anh-xanh-la-gi/', 'https://daquyanan.com/da-quy/thach-anh-xanh-la-gi/', 301);
$routes->addRedirect('/cach-chon-da-thach-anh-cho-nguoi-menh-kim/', 'https://daquyanan.com/phong-thuy/cach-chon-da-thach-anh-cho-nguoi-menh-kim/', 301);
$routes->addRedirect('/thach-anh-khoi/', 'https://daquyanan.com/da-quy/thach-anh-khoi/', 301);
$routes->addRedirect('/thach-anh-vang/', 'https://daquyanan.com/da-quy/thach-anh-vang/', 301);
$routes->addRedirect('/so-sanh-kim-cuong-thien-nhien-nhan-tao-moissanite-cz/', 'https://daquyanan.com/da-quy/so-sanh-kim-cuong-thien-nhien-nhan-tao-moissanite-cz/', 301);
$routes->addRedirect('/thach-anh-trang/', 'https://daquyanan.com/da-quy/thach-anh-trang/', 301);
$routes->addRedirect('/thach-anh-tim/', 'https://daquyanan.com/da-quy/thach-anh-tim/', 301);
$routes->addRedirect('/thach-anh-hong/', 'https://daquyanan.com/da-quy/thach-anh-hong/', 301);
$routes->addRedirect('/phan-biet-ma-nao-that-gia/', 'https://daquyanan.com/da-quy/phan-biet-ma-nao-that-gia/', 301);
$routes->addRedirect('/da-ma-nao/', 'https://daquyanan.com/da-quy/da-ma-nao/', 301);
$routes->addRedirect('/da-mat-ho/', 'https://daquyanan.com/da-quy/da-mat-ho/', 301);
$routes->addRedirect('/ten-cac-loai-da-quy-trong-tieng-anh/', 'https://daquyanan.com/da-quy/ten-cac-loai-da-quy-trong-tieng-anh/', 301);
$routes->addRedirect('/da-ho-ly/', 'https://daquyanan.com/phong-thuy/da-ho-ly/', 301);
$routes->addRedirect('/vong-tay-phong-thuy-menh-kim/', 'https://daquyanan.com/phong-thuy/vong-tay-phong-thuy-menh-kim/', 301);
$routes->addRedirect('/ty-huu-la-con-gi/', 'https://daquyanan.com/phong-thuy/ty-huu-la-con-gi/', 301);
$routes->addRedirect('/vong-tay-phong-thuy-menh-hoa/', 'https://daquyanan.com/phong-thuy/vong-tay-phong-thuy-menh-hoa/', 301);
$routes->addRedirect('/da-thach-anh-tho-co-gia-tri-nhu-nao-trong-phong-thuy/', 'https://daquyanan.com/da-quy/da-thach-anh-tho-co-gia-tri-nhu-nao-trong-phong-thuy/', 301);
$routes->addRedirect('/amber-ho-phach/', 'https://daquyanan.com/da-quy/amber-ho-phach/', 301);
$routes->addRedirect('/thach-anh-kim-cuong-herkimer-diamond/', 'https://daquyanan.com/da-quy/thach-anh-kim-cuong-herkimer-diamond/', 301);
$routes->addRedirect('/ty-huu-da-phong-thuy/', 'https://daquyanan.com/phong-thuy/ty-huu-da-phong-thuy/', 301);
$routes->addRedirect('/tac-dung-cua-vong-ho-phach-cho-be/', 'https://daquyanan.com/da-quy/tac-dung-cua-vong-ho-phach-cho-be/', 301);
$routes->addRedirect('/phat-ban-menh-12-con-giap/', 'https://daquyanan.com/phong-thuy/phat-ban-menh-12-con-giap/', 301);
$routes->addRedirect('/cach-hoa-giai-van-xui-hieu-qua-nhat/', 'https://daquyanan.com/phong-thuy/cach-hoa-giai-van-xui-hieu-qua-nhat/', 301);
$routes->addRedirect('/da-aquamarine/', 'https://daquyanan.com/da-quy/da-aquamarine/', 301);
$routes->addRedirect('/ma-nao-nam-hong/', 'https://daquyanan.com/da-quy/ma-nao-nam-hong/', 301);
$routes->addRedirect('/da-thach-anh-uu-linh/', 'https://daquyanan.com/da-quy/da-thach-anh-uu-linh/', 301);
$routes->addRedirect('/tran-trach-la-gi/', 'https://daquyanan.com/phong-thuy/tran-trach-la-gi/', 301);
$routes->addRedirect('/da-shungite/', 'https://daquyanan.com/da-quy/da-shungite/', 301);
$routes->addRedirect('/da-amazonite/', 'https://daquyanan.com/da-quy/da-amazonite/', 301);
$routes->addRedirect('/da-azurite/', 'https://daquyanan.com/da-quy/da-azurite/', 301);
$routes->addRedirect('/da-sapphire/', 'https://daquyanan.com/da-quy/da-sapphire/', 301);
$routes->addRedirect('/tieu-chuan-danh-gia-da-quy-qua-kieu-mai-cat/', 'https://daquyanan.com/da-quy/tieu-chuan-danh-gia-da-quy-qua-kieu-mai-cat/', 301);
$routes->addRedirect('/da-obsidian-thuy-tinh-nui-lua/', 'https://daquyanan.com/da-quy/da-obsidian-thuy-tinh-nui-lua/', 301);
$routes->addRedirect('/da-flourite/', 'https://daquyanan.com/da-quy/da-flourite/', 301);
$routes->addRedirect('/da-garnet-ngoc-hong-luu/', 'https://daquyanan.com/da-quy/da-garnet-ngoc-hong-luu/', 301);
$routes->addRedirect('/lapis-lazuli/', 'https://daquyanan.com/da-quy/lapis-lazuli/', 301);
$routes->addRedirect('/deo-da-mat-ho-co-tac-dung-gi/', 'https://daquyanan.com/da-quy/deo-da-mat-ho-co-tac-dung-gi/', 301);

$routes->addRedirect('/san-pham/vong-tay-ngoc-nephrite-ngoc-bich-canada/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-ngoc-nephrite-ngoc-bich-canada/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-thach-anh-toc-vang/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-thach-anh-toc-vang/', 301);
$routes->addRedirect('/san-pham/an-rong-ngoc-jadeite-tu-nhien-phi-thuy/', 'https://daquyanan.com/vat-pham-phong-thuy/an-rong-ngoc-jadeite-tu-nhien-phi-thuy/', 301);
$routes->addRedirect('/san-pham/mat-nhan-day-chuyen-ngoc-bich-nephrite-jade-thien-nhien/', 'https://daquyanan.com/mat-da-phong-thuy/mat-nhan-day-chuyen-ngoc-bich-nephrite-jade-thien-nhien/', 301);
$routes->addRedirect('/san-pham/bo-am-chen-ngoc-van-chan/', 'https://daquyanan.com/vat-pham-phong-thuy/bo-am-chen-ngoc-van-chan/', 301);
$routes->addRedirect('/san-pham/vong-ban-lien-ngoc-phi-thuy/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-ban-lien-ngoc-phi-thuy/', 301);
$routes->addRedirect('/san-pham/vat-pham-phong-thuy-treo-o-to/', 'https://daquyanan.com/mat-da-phong-thuy/vat-pham-phong-thuy-treo-o-to/', 301);
$routes->addRedirect('/san-pham/tuong-phat-di-lac-ngoc-hoang-long/', 'https://daquyanan.com/vat-pham-phong-thuy/tuong-phat-di-lac-ngoc-hoang-long/', 301);
$routes->addRedirect('/san-pham/ca-heo-vuot-bien-ngoc-serpentine/', 'https://daquyanan.com/vat-pham-phong-thuy/ca-heo-vuot-bien-ngoc-serpentine/', 301);
$routes->addRedirect('/san-pham/da-malachit/', 'https://daquyanan.com/vat-pham-phong-thuy/da-malachit/', 301);
$routes->addRedirect('/san-pham/phat-ba-quan-am-ngoc-bich-tu-nhien/', 'https://daquyanan.com/vat-pham-phong-thuy/phat-ba-quan-am-ngoc-bich-tu-nhien/', 301);
$routes->addRedirect('/san-pham/thiem-thu/', 'https://daquyanan.com/vat-pham-phong-thuy/thiem-thu/', 301);
$routes->addRedirect('/san-pham/tac-pham-thuan-buom-xuoi-gio/', 'https://daquyanan.com/vat-pham-phong-thuy/tac-pham-thuan-buom-xuoi-gio/', 301);
$routes->addRedirect('/san-pham/mat-phat-ban-menh-thach-anh-toc-vang-boc-vang-18k/', 'https://daquyanan.com/mat-da-phong-thuy/mat-phat-ban-menh-thach-anh-toc-vang-boc-vang-18k/', 301);
$routes->addRedirect('/san-pham/ngua-thach-anh-hong/', 'https://daquyanan.com/vat-pham-phong-thuy/ngua-thach-anh-hong/', 301);
$routes->addRedirect('/san-pham/da-thach-anh-vun/', 'https://daquyanan.com/vat-pham-phong-thuy/da-thach-anh-vun/', 301);
$routes->addRedirect('/san-pham/than-tai-ngoc-jadeite-tu-nhien/', 'https://daquyanan.com/vat-pham-phong-thuy/than-tai-ngoc-jadeite-tu-nhien/', 301);
$routes->addRedirect('/san-pham/dia-that-tinh-phong-thuy/', 'https://daquyanan.com/vat-pham-phong-thuy/dia-that-tinh-phong-thuy/', 301);
$routes->addRedirect('/san-pham/chim-cong-khong-tuoc-ma-nao-vang/', 'https://daquyanan.com/vat-pham-phong-thuy/chim-cong-khong-tuoc-ma-nao-vang/', 301);
$routes->addRedirect('/san-pham/ca-chep-vuot-vu-mon/', 'https://daquyanan.com/vat-pham-phong-thuy/ca-chep-vuot-vu-mon/', 301);
$routes->addRedirect('/san-pham/mat-nhan-ruby-vang-18k-danh-cho-nam-nu/', 'https://daquyanan.com/vat-pham-phong-thuy/mat-nhan-ruby-vang-18k-danh-cho-nam-nu/', 301);
$routes->addRedirect('/san-pham/cay-dao-da-18-qua/', 'https://daquyanan.com/vat-pham-phong-thuy/cay-dao-da-18-qua/', 301);
$routes->addRedirect('/san-pham/mau-cai-ao-chuon-chuon-bac-nga/', 'https://daquyanan.com/vat-pham-phong-thuy/mau-cai-ao-chuon-chuon-bac-nga/', 301);
$routes->addRedirect('/san-pham/qua-cau-canxit-vang/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-canxit-vang/', 301);
$routes->addRedirect('/san-pham/di-lac-tai-loc/', 'https://daquyanan.com/mat-da-phong-thuy/di-lac-tai-loc/', 301);
$routes->addRedirect('/san-pham/mat-day-deo-12-con-giap/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-deo-12-con-giap/', 301);
$routes->addRedirect('/san-pham/phat-adida-da-ma-nao-khoai-mon/', 'https://daquyanan.com/vat-pham-phong-thuy/phat-adida-da-ma-nao-khoai-mon/', 301);
$routes->addRedirect('/san-pham/mat-phat-ngoc-bich/', 'https://daquyanan.com/mat-da-phong-thuy/mat-phat-ngoc-bich/', 301);
$routes->addRedirect('/san-pham/mat-phat-phong-thuy/', 'https://daquyanan.com/mat-da-phong-thuy/mat-phat-phong-thuy/', 301);
$routes->addRedirect('/san-pham/hoa-hong-ruby/', 'https://daquyanan.com/mat-da-phong-thuy/hoa-hong-ruby/', 301);
$routes->addRedirect('/san-pham/phuong-hoang-ngoc-bich-nephrite-tu-nhien/', 'https://daquyanan.com/vat-pham-phong-thuy/phuong-hoang-ngoc-bich-nephrite-tu-nhien/', 301);
$routes->addRedirect('/san-pham/tuong-tam-da-phuc-loc-tho-ngoc-jadeite-phi-thuy/', 'https://daquyanan.com/vat-pham-phong-thuy/tuong-tam-da-phuc-loc-tho-ngoc-jadeite-phi-thuy/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-tourmaline/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-tourmaline/', 301);
$routes->addRedirect('/san-pham/vong-tay-ngoc-van-hong/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-ngoc-van-hong/', 301);
$routes->addRedirect('/san-pham/thap-van-xuong/', 'https://daquyanan.com/vat-pham-phong-thuy/thap-van-xuong/', 301);
$routes->addRedirect('/san-pham/qua-cau-thach-anh-trang/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-thach-anh-trang/', 301);
$routes->addRedirect('/san-pham/qua-cau-thach-anh-tim/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-thach-anh-tim/', 301);
$routes->addRedirect('/san-pham/qua-cau-thach-anh-hong/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-thach-anh-hong/', 301);
$routes->addRedirect('/san-pham/qua-cau-thach-anh-den/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-thach-anh-den/', 301);
$routes->addRedirect('/san-pham/qua-cau-da-mat-ho/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-da-mat-ho/', 301);
$routes->addRedirect('/san-pham/qua-cau-da-fluorit-xanh/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-da-fluorit-xanh/', 301);
$routes->addRedirect('/san-pham/qua-cau-ngoc-bich-do/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-ngoc-bich-do/', 301);
$routes->addRedirect('/san-pham/qua-cau-thach-anh-vang-co-tam-sao-6-canh/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-thach-anh-vang-co-tam-sao-6-canh/', 301);
$routes->addRedirect('/san-pham/ty-huu-thach-anh-trang/', 'https://daquyanan.com/vat-pham-phong-thuy/ty-huu-thach-anh-trang/', 301);
$routes->addRedirect('/san-pham/ty-huu-thach-anh-xanh/', 'https://daquyanan.com/vat-pham-phong-thuy/ty-huu-thach-anh-xanh/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-khoi/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-khoi/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-xanh/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-xanh/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-ma-nao-do/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-ma-nao-do/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-tim/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-tim/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-toc-xanh/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-toc-xanh/', 301);
$routes->addRedirect('/san-pham/ty-huu-thach-anh-toc-vang-ba-mia/', 'https://daquyanan.com/mat-da-phong-thuy/ty-huu-thach-anh-toc-vang-ba-mia/', 301);
$routes->addRedirect('/san-pham/cay-dao-da-thach-anh-hong/', 'https://daquyanan.com/vat-pham-phong-thuy/cay-dao-da-thach-anh-hong/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-da-ruby/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-da-ruby/', 301);
$routes->addRedirect('/san-pham/vong-da-beryl-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-beryl-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-thach-anh-dau-tay-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-thach-anh-dau-tay-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-mat-ho-da-sac-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-mat-ho-da-sac-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-mat-ho-do-nau-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-mat-ho-do-nau-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-mat-ho-xanh-den-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-mat-ho-xanh-den-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-mat-ho-vang-tuoi-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-mat-ho-vang-tuoi-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-mat-ho-vang-nau-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-mat-ho-vang-nau-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-mat-troi-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-mat-troi-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-xa-cu-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-xa-cu-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-diopside-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-diopside-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-da-kyanite-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-kyanite-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-ho-phach-cho-be/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-ho-phach-cho-be/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-ngoc-bich/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-ngoc-bich/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-trang/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-trang/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-hong/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-hong/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-ngoc-cam-thach/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-ngoc-cam-thach/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-vang/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-vang/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-ngoc-huyet/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-ngoc-huyet/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-da-mat-ho/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-da-mat-ho/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-da-aquamarine/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-da-aquamarine/', 301);
$routes->addRedirect('/san-pham/mat-ho-ly-ngoc-huyet-do/', 'https://daquyanan.com/mat-da-phong-thuy/mat-ho-ly-ngoc-huyet-do/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-thach-anh-den/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-thach-anh-den/', 301);
$routes->addRedirect('/san-pham/mat-ho-ly-thach-anh-vang/', 'https://daquyanan.com/mat-da-phong-thuy/mat-ho-ly-thach-anh-vang/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-thach-anh-trang/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-thach-anh-trang/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-da-mat-ho-vang/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-da-mat-ho-vang/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-thach-anh-tim/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-thach-anh-tim/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-da-thach-anh-xanh/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-da-thach-anh-xanh/', 301);
$routes->addRedirect('/san-pham/cay-lan-massage-mat-bang-da/', 'https://daquyanan.com/vat-pham-phong-thuy/cay-lan-massage-mat-bang-da/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-thach-anh-hong/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-thach-anh-hong/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-toc-den/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-toc-den/', 301);
$routes->addRedirect('/san-pham/bua-ho-menh-ngu-lo-than-tai-phu/', 'https://daquyanan.com/vat-pham-phong-thuy/bua-ho-menh-ngu-lo-than-tai-phu/', 301);
$routes->addRedirect('/san-pham/rong-thach-anh-xanh/', 'https://daquyanan.com/vat-pham-phong-thuy/rong-thach-anh-xanh/', 301);
$routes->addRedirect('/san-pham/tuong-phat-di-lac-ngoc-bich-tu-nhien/', 'https://daquyanan.com/vat-pham-phong-thuy/tuong-phat-di-lac-ngoc-bich-tu-nhien/', 301);
$routes->addRedirect('/san-pham/bo-tuong-tam-da-phuc-loc-tho/', 'https://daquyanan.com/vat-pham-phong-thuy/bo-tuong-tam-da-phuc-loc-tho/', 301);
$routes->addRedirect('/san-pham/dong-dieu/', 'https://daquyanan.com/vat-pham-phong-thuy/dong-dieu/', 301);
$routes->addRedirect('/san-pham/hoa-uu-dam/', 'https://daquyanan.com/vat-pham-phong-thuy/hoa-uu-dam/', 301);
$routes->addRedirect('/san-pham/da-ho-phach/', 'https://daquyanan.com/vat-pham-phong-thuy/da-ho-phach/', 301);
$routes->addRedirect('/san-pham/bo-tam-the-phat-chat-lieu-thach-anh-xanh/', 'https://daquyanan.com/vat-pham-phong-thuy/bo-tam-the-phat-chat-lieu-thach-anh-xanh/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-amazonite/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-amazonite/', 301);
$routes->addRedirect('/san-pham/lu-thong-mat-ho-vang-nau/', 'https://daquyanan.com/vat-pham-phong-thuy/lu-thong-mat-ho-vang-nau/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-onyx-den/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-onyx-den/', 301);
$routes->addRedirect('/san-pham/vong-tay-ho-phach/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-ho-phach/', 301);
$routes->addRedirect('/san-pham/phat-ban-menh-bat-dong-minh-vuong-phat-ban-menh-tuoi-dau/', 'https://daquyanan.com/mat-da-phong-thuy/phat-ban-menh-bat-dong-minh-vuong-phat-ban-menh-tuoi-dau/', 301);
$routes->addRedirect('/san-pham/phat-ban-menh-hu-khong-tang-bo-tat-phat-ban-menh-tuoi-suu-dan/', 'https://daquyanan.com/mat-da-phong-thuy/phat-ban-menh-hu-khong-tang-bo-tat-phat-ban-menh-tuoi-suu-dan/', 301);
$routes->addRedirect('/san-pham/phat-ban-menh-nhu-lai-dai-nhat-phat-ban-menh-tuoi-mui-than/', 'https://daquyanan.com/mat-da-phong-thuy/phat-ban-menh-nhu-lai-dai-nhat-phat-ban-menh-tuoi-mui-than/', 301);
$routes->addRedirect('/san-pham/phat-ban-menh-phat-a-di-da-phat-ban-menh-tuoi-tuat-hoi/', 'https://daquyanan.com/mat-da-phong-thuy/phat-ban-menh-phat-a-di-da-phat-ban-menh-tuoi-tuat-hoi/', 301);
$routes->addRedirect('/san-pham/phat-ban-menh-thien-thu-thien-nhan-phat-ban-menh-tuoi-ty/', 'https://daquyanan.com/mat-da-phong-thuy/phat-ban-menh-thien-thu-thien-nhan-phat-ban-menh-tuoi-ty/', 301);
$routes->addRedirect('/san-pham/phat-ban-menh-pho-hien-bo-tat-phat-ban-menh-tuoi-thin-ty/', 'https://daquyanan.com/mat-da-phong-thuy/phat-ban-menh-pho-hien-bo-tat-phat-ban-menh-tuoi-thin-ty/', 301);
$routes->addRedirect('/san-pham/phat-ban-menh-van-thu-bo-tat-phat-ban-menh-tuoi-mao/', 'https://daquyanan.com/mat-da-phong-thuy/phat-ban-menh-van-thu-bo-tat-phat-ban-menh-tuoi-mao/', 301);
$routes->addRedirect('/san-pham/qua-cau-thach-anh-trang-nuoc-dua/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-thach-anh-trang-nuoc-dua/', 301);
$routes->addRedirect('/san-pham/qua-cau-phong-thuy-thach-anh-vang/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-phong-thuy-thach-anh-vang/', 301);
$routes->addRedirect('/san-pham/qua-cau-thuy-tinh-do/', 'https://daquyanan.com/vat-pham-phong-thuy/qua-cau-thuy-tinh-do/', 301);
$routes->addRedirect('/san-pham/ty-huu-ngoc-hoang-long-da-canxit-vang/', 'https://daquyanan.com/vat-pham-phong-thuy/ty-huu-ngoc-hoang-long-da-canxit-vang/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-toc-vang/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-toc-vang/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-cam-thach/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-cam-thach/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-aquamarine/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-aquamarine/', 301);
$routes->addRedirect('/san-pham/mat-ho-ly-ngoc-bich/', 'https://daquyanan.com/mat-da-phong-thuy/mat-ho-ly-ngoc-bich/', 301);
$routes->addRedirect('/san-pham/khanh-treo-xe-o-to/', 'https://daquyanan.com/vat-pham-phong-thuy/khanh-treo-xe-o-to/', 301);
$routes->addRedirect('/san-pham/mat-day-chuyen-ty-huu-thach-anh-den/', 'https://daquyanan.com/mat-da-phong-thuy/mat-day-chuyen-ty-huu-thach-anh-den/', 301);
$routes->addRedirect('/san-pham/mat-da-ho-ly-thach-anh-khoi/', 'https://daquyanan.com/mat-da-phong-thuy/mat-da-ho-ly-thach-anh-khoi/', 301);
$routes->addRedirect('/san-pham/phat-ban-menh-dai-the-chi-bo-tat-phat-ban-menh-tuoi-ngo/', 'https://daquyanan.com/mat-da-phong-thuy/phat-ban-menh-dai-the-chi-bo-tat-phat-ban-menh-tuoi-ngo/', 301);
$routes->addRedirect('/san-pham/vong-da-mat-trang-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-mat-trang-mix-bac/', 301);
$routes->addRedirect('/san-pham/da-aquamarine-an-an/', 'https://daquyanan.com/mat-da-phong-thuy/da-aquamarine-an-an/', 301);
$routes->addRedirect('/san-pham/da-sapphire-an-an/', 'https://daquyanan.com/vat-pham-phong-thuy/da-sapphire-an-an/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-xanh-luc/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-xanh-luc/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-do-nau/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-do-nau/', 301);
$routes->addRedirect('/san-pham/vong-da-mat-ho-xanh-duong/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-mat-ho-xanh-duong/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-da-sac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-da-sac/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-that-day-1-hat/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-that-day-1-hat/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-vang-ty-huu/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-vang-ty-huu/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-do-nau-mix-ty-huu-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-do-nau-mix-ty-huu-bac/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-vang-nau-mix-ty-huu-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-vang-nau-mix-ty-huu-bac/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-xanh-den-mix-ty-huu-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-xanh-den-mix-ty-huu-bac/', 301);
$routes->addRedirect('/san-pham/vong-tay-thach-anh-khoi/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-thach-anh-khoi/', 301);
$routes->addRedirect('/san-pham/vong-tay-thach-anh-hong/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-thach-anh-hong/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-thach-anh-uu-linh-trang/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-thach-anh-uu-linh-trang/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-thach-anh-trang/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-thach-anh-trang/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-thach-anh-toc-vang/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-thach-anh-toc-vang/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-thach-anh-tim/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-thach-anh-tim/', 301);
$routes->addRedirect('/san-pham/vong-tay-thach-anh-toc-den/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-thach-anh-toc-den/', 301);
$routes->addRedirect('/san-pham/vong-tay-thach-anh-xanh/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-thach-anh-xanh/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-da-sac-mix-ty-huu-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-da-sac-mix-ty-huu-bac/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-vang-nau/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-vang-nau/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-thach-anh-toc-do-vip/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-thach-anh-toc-do-vip/', 301);
$routes->addRedirect('/san-pham/vong-tay-thach-anh-vang/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-thach-anh-vang/', 301);
$routes->addRedirect('/san-pham/vong-tay-thach-anh-toc-do-dong-truc-vip/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-thach-anh-toc-do-dong-truc-vip/', 301);
$routes->addRedirect('/san-pham/vong-tay-thach-anh-uu-linh-ngu-sac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-thach-anh-uu-linh-ngu-sac/', 301);
$routes->addRedirect('/san-pham/vong-tay-thach-anh-toc-tam-tai/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-thach-anh-toc-tam-tai/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-thach-anh-xanh-ty-huu/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-thach-anh-xanh-ty-huu/', 301);
$routes->addRedirect('/san-pham/vong-tay-ma-nao-xanh/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-ma-nao-xanh/', 301);
$routes->addRedirect('/san-pham/vong-tay-ma-nao-vang/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-ma-nao-vang/', 301);
$routes->addRedirect('/san-pham/vong-tay-ma-nao-trang/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-ma-nao-trang/', 301);
$routes->addRedirect('/san-pham/vong-tay-ma-nao-do/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-ma-nao-do/', 301);
$routes->addRedirect('/san-pham/vong-tay-ma-nao-reu/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-ma-nao-reu/', 301);
$routes->addRedirect('/san-pham/vong-deo-tay-ma-nao-ban-lien/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-deo-tay-ma-nao-ban-lien/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-aquamarine/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-aquamarine/', 301);
$routes->addRedirect('/san-pham/vong-tay-diopside/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-diopside/', 301);
$routes->addRedirect('/san-pham/vong-da-aquamarine-mix-bac/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-da-aquamarine-mix-bac/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-ho-vang-tuoi/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-ho-vang-tuoi/', 301);
$routes->addRedirect('/san-pham/vong-tay-ngoc-hong-luu-garnet/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-ngoc-hong-luu-garnet/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-kyanite/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-kyanite/', 301);
$routes->addRedirect('/san-pham/bi-da-lan-tay/', 'https://daquyanan.com/vat-pham-phong-thuy/bi-da-lan-tay/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-beryl/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-beryl/', 301);
$routes->addRedirect('/san-pham/vong-tay-da-mat-trang-tu-nhien/', 'https://daquyanan.com/vong-tay-phong-thuy/vong-tay-da-mat-trang-tu-nhien/', 301);


$routes->addRedirect('/danh-muc/vat-pham-phong-thuy/ty-huu/', 'https://daquyanan.com/ty-huu/', 301);
$routes->addRedirect('/danh-muc/vat-pham-phong-thuy/gay-nhu-y/', 'https://daquyanan.com/gay-nhu-y/', 301);
$routes->addRedirect('/danh-muc/mat-da-phong-thuy/mat-da-khac/', 'https://daquyanan.com/mat-da-khac/', 301);
$routes->addRedirect('/danh-muc/vat-pham-phong-thuy/thap-van-xuong/', 'https://daquyanan.com/thap-van-xuong/', 301);
$routes->addRedirect('/danh-muc/mat-da-phong-thuy/ho-ly-phong-thuy/', 'https://daquyanan.com/ho-ly-phong-thuy/', 301);
$routes->addRedirect('/danh-muc/vong-tay-phong-thuy/vong-tay-da-cac-loai/', 'https://daquyanan.com/vong-tay-da-cac-loai/', 301);


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
