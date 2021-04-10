# -*- coding: utf-8 -*-

from func2.import_lib import *
from func2.save_get_data import *
from func2.get_env import *
from func2.get_partial_web_content import *
from urllib.parse import urlparse

POSTCAT_LINKALL = getENV("POSTCAT_LINKALL")
PRODUCTCAT_LINKALL = getENV("PRODUCTCAT_LINKALL")
POST_LINKALL = getENV("POST_LINKALL")
PRODUCT_LINKALL = getENV("PRODUCT_LINKALL")
PAGE_LINKALL = getENV("PAGE_LINKALL")
PRODUCTATT_LINKALL = getENV("PRODUCTATT_LINKALL")
ROUTE_LINKALL = getENV("ROUTE_LINKALL")
MENU_LINKALL = getENV("MENU_LINKALL")

def saveWeblink():
    save2json(getWebDatalink(ROUTE_LINKALL), "data_link/route.json")

def saveData_Postcat(id, url):
    data = getData_category(url)
    save2json(data, "data_json/postcat/" + str(id))

def saveData_Post(id, url):
    data = getData_post(url)
    save2json(data, "data_json/post/" + str(id))

def saveData_Product(id, url):
    data = getData_product(url)
    save2json(data, "data_json/product/" + str(id))


def saveData_Productcat(id, url):
    data = getData_productcategory(url)
    save2json(data, "data_json/productcat/" + str(id))

def saveData_Page(id, url):
    data = getData_page(url)
    save2json(data, "data_json/page/" + str(id))

def saveData_Productatt(id, url):
    data = getData_productcategory(url)
    save2json(data, "data_json/productatt/" + str(id))

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