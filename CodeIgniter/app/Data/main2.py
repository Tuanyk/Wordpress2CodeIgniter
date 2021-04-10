# -*- coding: utf-8 -*-

from func2.save_data_web import *
import argparse


parser = argparse.ArgumentParser(description="Add path...")
parser.add_argument("--postid", type=int, default=0)
parser.add_argument("--postlink", type=str, default="")
parser.add_argument("--productid", type=int, default=0)
parser.add_argument("--productlink", type=str, default="")

args = parser.parse_args()

postid = args.postid
postlink = args.postlink
productid = args.productid
productlink = args.productlink

if productid != 0:
    directoryInit()
    saveWeblink()
    #saveData_Menu()
    saveData_Route()
    saveData_Product(productid, productlink)
    product_cats = getData_product(productlink)["category"]
    for item in product_cats:
        saveData_Productcat(item[0], item[1])

if postid != 0:
    directoryInit()
    saveWeblink()
    saveData_Menu()
    saveData_Route()
    saveData_Post(postid, postlink)