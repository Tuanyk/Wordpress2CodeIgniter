# -*- coding: utf-8 -*-

from func.import_lib import *
from func.save_get_data import *
from func.get_env import *
from func.get_partial_web_content import *
from urllib.parse import urlparse

POSTCAT_LINKALL = getENV("POSTCAT_LINKALL")
PRODUCTCAT_LINKALL = getENV("PRODUCTCAT_LINKALL")
POST_LINKALL = getENV("POST_LINKALL")
PRODUCT_LINKALL = getENV("PRODUCT_LINKALL")
PAGE_LINKALL = getENV("PAGE_LINKALL")
PRODUCTATT_LINKALL = getENV("PRODUCTATT_LINKALL")
ROUTE_LINKALL = getENV("ROUTE_LINKALL")
MENU_LINKALL = getENV("MENU_LINKALL")
SEARCH_LINKALL = getENV("SEARCH_LINKALL")
SHOP_LINKALL = getENV("SHOP_LINKALL")

def saveWeblink():
    saveDataLines("data_link/postcat", getWebDatalink(POSTCAT_LINKALL))
    saveDataLines("data_link/productcat", getWebDatalink(PRODUCTCAT_LINKALL))
    saveDataLines("data_link/post", getWebDatalink(POST_LINKALL))
    saveDataLines("data_link/product", getWebDatalink(PRODUCT_LINKALL))
    saveDataLines("data_link/page", getWebDatalink(PAGE_LINKALL))
    saveDataLines("data_link/productatt", getWebDatalink(PRODUCTATT_LINKALL))

def saveData_Postcat(id=0):
    postcat_urls = getLinkData("postcat")
    if id == 0:
        for url in postcat_urls:
            data = getData_category(url)
            save2json(data, "data_json/postcat/" + str(data['data_cat']['cat_id']))
    if id != 0:
        for url in postcat_urls:
            data = getData_category(url)
            if str(data['data_cat']['cat_id']) == str(id):
                save2json(data, "data_json/postcat/" + str(data['data_cat']['cat_id']))
                break

def saveData_Post(id=0):
    post_urls = getLinkData("post")
    if id == 0:
        for url in post_urls:
            data = getData_post(url)
            save2json(data, "data_json/post/" + str(data['post_id']))
    if id != 0:
        for url in post_urls:
            data = getData_post(url)
            if str(data['post_id']) == str(id):
                save2json(data, "data_json/post/" + str(data['post_id']))
                break

def saveData_Product(id=0):
    product_urls = getLinkData("product")
    if id == 0:

        for url in product_urls:
            data = getData_product(url)
            save2json(data, "data_json/product/" + str(data['post_id']))
    if id != 0:
        for url in product_urls:
            data = getData_product(url)
            if str(data['post_id']) == str(id):
                save2json(data, "data_json/product/" + str(data['post_id']))
                break

def saveData_Productcat(id=0):
    productcat_urls = getLinkData("productcat")
    if id == 0:
        for url in productcat_urls:
            data = getData_productcategory(url)
            save2json(data, "data_json/productcat/" + str(data['data_cat']['cat_id']))
    if id != 0:
        for url in productcat_urls:
            data = getData_productcategory(url)
            if str(data['data_cat']['cat_id']) == str(id):
                save2json(data, "data_json/productcat/" + str(data['data_cat']['cat_id']))
                break

def saveData_Page(id=0):
    page_urls = getLinkData("page")
    if id == 0:
        for url in page_urls:
            data = getData_page(url)
            save2json(data, "data_json/page/" + str(data['post_id']))
    if id != 0:
        for url in page_urls:
            data = getData_page(url)
            if str(data['post_id']) == str(id):
                save2json(data, "data_json/page/" + str(data['post_id']))
                break

def saveData_Productatt(id=0):
    productatt_urls = getLinkData("productatt")
    if id == 0:
        for url in productatt_urls:
            data = getData_productcategory(url)
            save2json(data, "data_json/productatt/" + str(data['data_cat']['cat_id']))
    if id != 0:
        for url in productatt_urls:
            data = getData_productcategory(url)
            if str(data['data_cat']['cat_id']) == str(id):
                save2json(data, "data_json/productatt/" + str(data['data_cat']['cat_id']))
                break

def saveData_Search():
    param = getFirstParam(SEARCH_LINKALL)
    login_auth = {
        'passport': password,
        param[0]: param[1],
    }
    r = requests.post(SEARCH_LINKALL, data=login_auth)
    soup = BeautifulSoup(r.text, "html.parser")
    posts = soup.find("div", id="list-post").find_all("div", class_="item")
    products = soup.find("div", id="list-product").find_all("div", class_="item")

    data = []
    for post in posts:
        link = urlparse(post.find("div", class_="link").text.strip()).path
        id = post.find("div", class_="id").text.strip()
        title = post.find("div", class_="title").text.strip()
        data.append([id, title, link, "post"])

    for product in products:
        link = urlparse(product.find("div", class_="link").text.strip()).path
        id = product.find("div", class_="id").text.strip()
        title = product.find("div", class_="title").text.strip()
        data.append([id, title, link, "product"])

    save2json(data, "data_json/search")

def saveData_Shop():
    param = getFirstParam(SHOP_LINKALL)
    login_auth = {
        'passport': password,
        param[0]: param[1],
    }
    r = requests.post(SHOP_LINKALL, data=login_auth)
    soup = BeautifulSoup(r.text, "html.parser")
    products = soup.find("div", id="list-product-shop").find_all("div", class_="item")

    data = []

    for product in products:
        link = sanitize_input(urlparse(product.find("div", class_="link").text.strip()).path)
        id = product.find("div", class_="id").text.strip()
        title = product.find("div", class_="title").text.strip()
        category = []
        category_soup = product.find("div", class_="category").find_all("div", class_="term-item")
        for cat in category_soup:
            cat_id = cat.find("div", class_="term_id").text.strip()
            cat_link = sanitize_input(cat.find("div", class_="term_link").text.strip())
            cat_name = cat.find("div", class_="term_name").text.strip()
            category.append({"id": cat_id, "link": cat_link, "name": cat_name})
        
        attributes_soup = product.find("div", class_="attributes")
        hop_menh = attributes_soup.find("div", class_="hop-menh").text.strip().split(", ")
        chat_lieu = attributes_soup.find("div", class_="chat-lieu").text.strip().split(", ")
        kich_co = attributes_soup.find("div", class_="kich-co").text.strip().split(", ")
        kieu_dang = attributes_soup.find("div", class_="kieu-dang").text.strip().split(", ")
        attributes = {"hop_menh": hop_menh, "chat_lieu": chat_lieu, "kich_co": kich_co, "kieu_dang": kieu_dang}
        
        featured_image_soup = product.find("div", class_="featured-image")
        featured_image_full = sanitize_input(featured_image_soup.find("img", class_="full")["src"])
        featured_image_medium = sanitize_input(featured_image_soup.find("img", class_="medium")["src"])
        featured_image_thumbnail = sanitize_input(featured_image_soup.find("img", class_="thumbnail")["src"])
        featured_image = {"full": featured_image_full, "medium": featured_image_medium, "thumbnail": featured_image_thumbnail}

        date = product.find("div", class_="date").text.strip()

        price_soup = product.find("div", class_="price")
        regular_price = price_soup.find("div", class_="regular").text.strip()
        sale_price = price_soup.find("div", class_="sale").text.strip()
        real_price = price_soup.find("div", class_="price").text.strip()
        html_price = price_soup.find("div", class_="html-price").text.strip()

        price = {"regular": regular_price, "sale": sale_price, "real": real_price, "html": html_price}

        data_json = {"link": link, "category": category, "title": title, "id": id, "attributes": attributes, "featured_image": featured_image, "date": date, "price": price}

        data.append(data_json)

    save2json(data, "data_json/shop")

def saveData_Route():
    param = getFirstParam(ROUTE_LINKALL)
    login_auth = {
        'passport': password,
        param[0]: param[1],
    }
    r = requests.post(ROUTE_LINKALL, data=login_auth)
    soup = BeautifulSoup(r.text, "html.parser")
    categories = soup.find("div", id="categories").find_all("div", class_="item")
    product_categories = soup.find("div", id="product-categories").find_all("div", class_="item")
    product_attributes = soup.find("div", id="product-attributes").find_all("div", class_="item")
    posts = soup.find("div", id="posts").find_all("div", class_="item")
    pages = soup.find("div", id="pages").find_all("div", class_="item")
    products = soup.find("div", id="products").find_all("div", class_="item")

    data = {}
    for category in categories:
        slug = urlparse(category.find("div", class_="link").text.strip()).path
        id = category.find("div", class_="id").text.strip()
        data_store_path = "data_json/postcat/" + str(id)
        data[slug] = data_store_path

    for product_category in product_categories:
        slug = urlparse(product_category.find("div", class_="link").text.strip()).path
        id = product_category.find("div", class_="id").text.strip()
        data_store_path = "data_json/productcat/" + str(id)
        data[slug] = data_store_path

    for product_attribute in product_attributes:
        slug = urlparse(product_attribute.find("div", class_="link").text.strip()).path
        id = product_attribute.find("div", class_="id").text.strip()
        data_store_path = "data_json/productatt/" + str(id)
        data[slug] = data_store_path

    for post in posts:
        slug = urlparse(post.find("div", class_="link").text.strip()).path
        id = post.find("div", class_="id").text.strip()
        data_store_path = "data_json/post/" + str(id)
        data[slug] = data_store_path

    for page in pages:
        slug = urlparse(page.find("div", class_="link").text.strip()).path
        id = page.find("div", class_="id").text.strip()
        data_store_path = "data_json/page/" + str(id)
        data[slug] = data_store_path

    for product in products:
        slug = urlparse(product.find("div", class_="link").text.strip()).path
        id = product.find("div", class_="id").text.strip()
        data_store_path = "data_json/product/" + str(id)
        data[slug] = data_store_path

    save2json(data, "data_json/route")

def getCurrentMenuItem(soup):
    a_tag = soup.find("a")
    return [a_tag.text.strip(), sanitize_input(a_tag['href'])]

def getCurrentMenuItemLevel(soup):
    current_soup = soup
    level = 0
    while current_soup.name != "div":
        current_soup = current_soup.parent.parent
        level += 1
    return level

def getMenuHierarchy(soup_list):
    result = []
    for soup in soup_list:
        result.append(getCurrentMenuItemLevel(soup))
    return result



def saveData_Menu():
    param = getFirstParam(MENU_LINKALL)
    login_auth = {
        'passport': password,
        param[0]: param[1],
    }
    r = requests.post(MENU_LINKALL, data=login_auth)
    soup = BeautifulSoup(r.text, "html.parser")
    menu_items_soup = soup.find("ul", id="main-menu").find_all("li")
    data = {}
    data['hierarchy'] = getMenuHierarchy(menu_items_soup)
    menu_item = []
    for item in menu_items_soup:
        menu_item.append(getCurrentMenuItem(item))
    data['menu_item'] = menu_item
    save2json(data, "data_json/menu")