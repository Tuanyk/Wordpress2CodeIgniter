# -*- coding: utf-8 -*-

from func2.import_lib import *
from func2.get_env import *
password = getENV("PASS")
# File tổng hợp các hàm dùng để Get và Save Data, Save Link Post, Product, Category, Product Category

def getFirstParam(url):
    param = [list(i) for i in parse.parse_qs(parse.urlparse(url).query).items()]
    return [param[0][0], param[0][1][0]]

def directoryInit():
    pathlib.Path("data_json/").mkdir(exist_ok=True)
    pathlib.Path("data_link/").mkdir(exist_ok=True)
    pathlib.Path("data_json/post/").mkdir(exist_ok=True)
    pathlib.Path("data_json/product/").mkdir(exist_ok=True)
    pathlib.Path("data_json/postcat/").mkdir(exist_ok=True)
    pathlib.Path("data_json/productcat/").mkdir(exist_ok=True)
    pathlib.Path("data_json/productatt/").mkdir(exist_ok=True)
    pathlib.Path("data_json/page/").mkdir(exist_ok=True)

def saveDataLines(filename, data):
    #Save Arraylist to every lines
    with open(filename, "w") as file:
        file.write("\n".join(data))

def getWebDatalink(url):
    param = getFirstParam(url)
    data = {
        'passport': password,
        param[0]: param[1]
    }
    r = requests.post(url, data=data)
    soup = BeautifulSoup(r.text, "html.parser")
    all_links = soup.find_all("div", class_="item")
    result = []
    for item in all_links:
        item_id = item.find("div", class_="id").text.strip()
        item_link = item.find("div", class_="link").text.strip()
        result.append([item_id, item_link])
    return result

def save2json(data, dataname):
    with open(dataname, "w") as file:
        json.dump(data, file)

def returnArrayFromFile(filepath):
    with open(filepath, "r") as file:
        return file.read().strip().split("\n")



def getLinkData():
    path = "data_link/route.json"
    with open(path) as json_file:
        return json.load(json_file)

def getIdFromLink(url):
    data = getLinkData()
    for item in data:
        if url == item[1]:
            return item[0]
    return None
