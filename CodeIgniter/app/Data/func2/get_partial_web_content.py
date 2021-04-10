# -*- coding: utf-8 -*-

from func2.import_lib import *
from func2.sanitize_content import *

password = getENV("PASS")


def getAllTagbyRegex(pattern, soup, open_tag, end_tag):
    meta_tags_regex = re.findall(pattern, str(soup))
    meta_tags = []
    for meta in meta_tags_regex:
        meta_tags.append(open_tag + meta + end_tag)
    return meta_tags

def Elements_to_Str(elements):
    result = ""
    for each_element in elements:
        result += trueLink(str(each_element))
    return result

def get_Attr_Elements(elements, attr):
    result = []
    for element in elements:
        result.append(trueLink(element[attr]))
    return result

def sanitize_input(something):
    if type(something) != str:
        return Elements_to_Str(something)
    else:
        return trueLink(something)

def getData_post(url):
    login_auth = {
        'passport': password,
    }
    data = {}
    r = requests.post(url, data=login_auth)
    print(url)
    soup = BeautifulSoup(r.text, "html.parser")

    post_id = soup.find("div", id="data-id").text.strip()
    data["post_id"] = post_id

    title = soup.find("h1", id="entry-title").text.strip()
    data["title"] = title

    content = str(soup.find("div", id="entry-content"))
    data["content"] = sanitize_input(content)

    featured_image = soup.find("div", id="featured-image").find("img")["src"]
    data["featured_image"] = sanitize_input(featured_image)

    featured_image_size = [soup.find("div", id="featured-image").find("img")["width"], soup.find("div", id="featured-image").find("img")["height"]]
    data["featured_image_size"] = featured_image_size

    category_name = soup.find("div", id="data-category-name").text.strip()
    data["category_name"] = category_name

    slug = soup.find("div", id="data-slug-post").text.strip()
    data["slug"] = slug

    publish_time = soup.find("div", id="data-publish-time").text.strip()
    data["publish_time"] = publish_time

    schema = soup.find_all("script", {"type": "application/ld+json"})
    data["schema"] = sanitize_input(schema)

    meta_tags = getAllTagbyRegex(r"<meta(.*?)>", str(soup), "<meta", ">")
    data["meta_tags"] = sanitize_input(meta_tags)

    link_tags = soup.find_all("link", {"rel": [["canonical"], ["icon"], ["apple-touch-icon"]]})
    data["link_tags"] = sanitize_input(link_tags)

    return data

def getData_page(url):
    login_auth = {
        'passport': password,
    }
    data = {}
    r = requests.post(url, data=login_auth)
    print(url)
    soup = BeautifulSoup(r.text, "html.parser")

    post_id = soup.find("div", id="data-id").text.strip()
    data["post_id"] = post_id

    title = soup.find("h1", id="entry-title").text.strip()
    data["title"] = title

    content = str(soup.find("div", id="entry-content"))
    data["content"] = sanitize_input(content)

    slug = soup.find("div", id="data-slug-post").text.strip()
    data["slug"] = slug

    publish_time = soup.find("div", id="data-publish-time").text.strip()
    data["publish_time"] = publish_time

    schema = soup.find_all("script", {"type": "application/ld+json"})
    data["schema"] = sanitize_input(schema)

    meta_tags = getAllTagbyRegex(r"<meta(.*?)>", str(soup), "<meta", ">")
    data["meta_tags"] = sanitize_input(meta_tags)

    link_tags = soup.find_all("link", {"rel": [["canonical"], ["icon"], ["apple-touch-icon"]]})
    data["link_tags"] = sanitize_input(link_tags)

    return data

def getData_product(url):
    login_auth = {
        'passport': password,
    }
    data = {}
    r = requests.post(url, data=login_auth)
    print(url)
    soup = BeautifulSoup(r.text, "html.parser")

    post_id = soup.find("div", id="data-id").text.strip()
    data["post_id"] = post_id

    title = soup.find("h1", id="entry-title").text.strip()
    data["title"] = title

    featured_image = soup.find("div", id="featured-image").find("img")["src"]
    data["featured_image"] = sanitize_input(featured_image)

    featured_image_soup = soup.find("div", id="featured-image-all-size")
    featured_image_medium = featured_image_soup.find("img", class_="medium")["src"]
    featured_image_thumbnail = featured_image_soup.find("img", class_="thumbnail")["src"]
    data["featured_image_medium"] = sanitize_input(featured_image_medium)
    data["featured_image_thumbnail"] = sanitize_input(featured_image_thumbnail)

    category_name = str(soup.find("div", id="data-category-name"))
    data["category_name"] = sanitize_input(category_name)

    category_id_soup = soup.find("div", id="data-category-id").find_all("div", class_="item")
    category = []
    for cat_id_soup in category_id_soup:
        cat_id = cat_id_soup.find("div", class_="term_id").text.strip()
        cat_link = cat_id_soup.find("div", class_="term_link").text.strip()
        category.append([cat_id, cat_link])
    data["category"] = category

    slug = soup.find("div", id="data-slug-post").text.strip()
    data["slug"] = slug

    publish_time = soup.find("div", id="data-publish-time").text.strip()
    data["publish_time"] = publish_time

    schema = soup.find_all("script", {"type": "application/ld+json"})
    data["schema"] = sanitize_input(schema)

    meta_tags = getAllTagbyRegex(r"<meta(.*?)>", str(soup), "<meta", ">")
    data["meta"] = sanitize_input(meta_tags)

    link_tags = soup.find_all("link", {"rel": [["canonical"], ["icon"], ["apple-touch-icon"]]})
    data["link_tag"] = sanitize_input(link_tags)

    buynow_button_a = soup.find("a", class_="devvn_buy_now")
    buynow_button_form = soup.find("div", class_="devvn-popup-quickbuy")
    buynow_button = str(buynow_button_a) + str(buynow_button_form)
    data["buynow_button"] = ""
    if str(buynow_button_a) != "None":
        data["buynow_button"] = sanitize_input(buynow_button)

    product_attributes = str(soup.find("div", id="data-attribute").find("table"))
    data["product_attributes"] = sanitize_input(product_attributes)

    price = str(soup.find("div", id="data-price-html"))
    data["price"] = price

    hopmenh_button = ""
    if soup.find("span", class_="Hopmenh"):
        hopmenh_button = str(soup.find("span", class_="Hopmenh"))
    data["hopmenh_button"] = sanitize_input(hopmenh_button)

    variations_form = ""
    if soup.find("form", class_="variations_form"):
        variations_form = soup.find("form", class_="variations_form")
        variations_form.find("div", class_="woocommerce-variation-add-to-cart").extract()

    data["variations_form"] = str(variations_form)

    content = str(soup.find("div", id="entry-content"))
    data["content"] = sanitize_input(content)

    image_galleries = soup.find("div", id="data-image-galleries").find_all("img")
    image_og = get_Attr_Elements(image_galleries, "src")
    image_full = get_Attr_Elements(image_galleries, "data-full-url")
    image_medium = get_Attr_Elements(image_galleries, "data-medium-url")
    image_thumbnail = get_Attr_Elements(image_galleries, "data-thumbnail-url")
    product_images = [[a, b, c, d] for a, b, c, d in zip(image_og, image_full, image_medium, image_thumbnail)]

    data["product_images"] = product_images

    description = soup.find("div", id="data-short-description")
    data["description"] = sanitize_input(description)


    return data
def getData_category(url):
    login_auth = {
        'passport': password,
    }
    data = {}
    data_cat = {}
    r = requests.post(url, data=login_auth)
    print(url)
    soup = BeautifulSoup(r.text, "html.parser")

    cat_id = soup.find("div", id="data-id").text.strip()
    data_cat["cat_id"] = cat_id

    cat_slug = soup.find("div", id="data-slug-post").text.strip()
    data_cat["cat_slug"] = cat_slug

    title = soup.find("div", id="data-entry-title").find("h1").text.strip()
    data_cat["title"] = title

    excerpt = soup.find("div", id="data-excerpt")
    data_cat["excerpt"] = sanitize_input(excerpt)

    yoast_description = soup.find("div", id="data-yoast-description")
    data_cat["yoast_description"] = sanitize_input(yoast_description)

    posts_data_soup = soup.find_all("div", class_="data-post-infomation")
    data_cat["post_num"] = str(len(posts_data_soup))


    data_post = {}

    for i in range(0, len(posts_data_soup)):
        p_soup = posts_data_soup[i]
        current_post_data = {}

        post_title = p_soup.find("h2", class_="post-title").text.strip()
        current_post_data["post_title"] = post_title

        post_excerpt = p_soup.find("div", class_="post-excerpt")
        current_post_data["post_excerpt"] = sanitize_input(post_excerpt)

        post_yoast_description = p_soup.find("div", class_="post-yoast-description")
        current_post_data["post_yoast_description"] = sanitize_input(post_yoast_description)

        post_permalink = p_soup.find("div", class_="post-permalink").text.strip()
        current_post_data["post_permalink"] = sanitize_input(post_permalink)

        post_featured_image_soup = p_soup.find("div", class_="post-featured-image").find("img")
        post_featured_image_og = trueLink(post_featured_image_soup['src'])
        post_featured_full = trueLink(post_featured_image_soup['data-full-image'])
        post_featured_medium = trueLink(post_featured_image_soup['data-medium-image'])
        post_featured_thumbnail = trueLink(post_featured_image_soup['data-thumbnail-image'])
        post_featured_image = [post_featured_image_og, post_featured_full, post_featured_medium, post_featured_thumbnail]
        current_post_data['post_featured_image'] = post_featured_image

        data_post[str(i)] = current_post_data


    data["data_cat"] = data_cat
    data["data_post"] = data_post

    return data
def getData_productcategory(url):
    login_auth = {
        'passport': password,
    }
    data = {}
    data_cat = {}
    r = requests.post(url, data=login_auth)
    print(url)
    soup = BeautifulSoup(r.text, "html.parser")

    cat_id = soup.find("div", id="data-id").text.strip()
    data_cat["cat_id"] = cat_id

    cat_slug = soup.find("div", id="data-slug-post").text.strip()
    data_cat["cat_slug"] = cat_slug

    title = soup.find("div", id="data-entry-title").find("h1").text.strip()
    data_cat["title"] = title

    excerpt = soup.find("div", id="data-excerpt")
    data_cat["excerpt"] = sanitize_input(excerpt)

    yoast_description = soup.find("div", id="data-yoast-description")
    data_cat["yoast_description"] = sanitize_input(yoast_description)

    posts_data_soup = soup.find_all("div", class_="data-post-infomation")
    data_cat["post_num"] = str(len(posts_data_soup))


    data_post = {}

    for i in range(0, len(posts_data_soup)):
        p_soup = posts_data_soup[i]
        current_post_data = {}

        post_title = p_soup.find("h2", class_="post-title").text.strip()
        current_post_data["post_title"] = post_title

        post_excerpt = p_soup.find("div", class_="post-excerpt")
        current_post_data["post_excerpt"] = sanitize_input(post_excerpt)

        product_price = p_soup.find("div", class_="price")
        current_post_data["price"] = str(product_price)

        post_yoast_description = p_soup.find("div", class_="post-yoast-description")
        current_post_data["post_yoast_description"] = sanitize_input(post_yoast_description)

        post_permalink = p_soup.find("div", class_="post-permalink").text.strip()
        current_post_data["post_permalink"] = sanitize_input(post_permalink)

        post_featured_image_soup = p_soup.find("div", class_="post-featured-image").find("img")
        post_featured_image_og = trueLink(post_featured_image_soup['src'])
        post_featured_full = trueLink(post_featured_image_soup['data-full-image'])
        post_featured_medium = trueLink(post_featured_image_soup['data-medium-image'])
        post_featured_thumbnail = trueLink(post_featured_image_soup['data-thumbnail-image'])
        post_featured_image = [post_featured_image_og, post_featured_full, post_featured_medium, post_featured_thumbnail]
        current_post_data['post_featured_image'] = post_featured_image

        data_post[str(i)] = current_post_data


    data["data_cat"] = data_cat
    data["data_post"] = data_post

    return data

def get_product_cat_link(url):
    data = getData_product(url)
    category_soup = BeautifulSoup(data['category_name'], "html.parser").find_all("a")
    category_links = []
    for soup in category_soup:
        category_links.append(reverse_trueLink(soup['href'].strip()))
    return category_links

def get_product_cat_id(url):
    data = getData_product(url)
    result = [x for x in data['category_id'].split(",") if x]
    return result