# -*- coding: utf-8 -*-

from func.save_data_web import *
import argparse


parser = argparse.ArgumentParser(description="Add path...")
parser.add_argument("--savePostcat", type=str, default="")
parser.add_argument("--saveProductcat", type=str, default="")
parser.add_argument("--savePost", type=str, default="")
parser.add_argument("--saveProduct", type=str, default="")
parser.add_argument("--savePage", type=str, default="")
parser.add_argument("--saveProductatt", type=str, default="")

args = parser.parse_args()

s_Postcat = args.savePostcat
s_Productcat = args.saveProductcat
s_Post = args.savePost
s_Product = args.saveProduct
s_Page = args.savePage
s_Productatt = args.saveProductatt


directoryInit()
saveWeblink()
saveData_Menu()
saveData_Route()

if s_Postcat + s_Productcat + s_Post + s_Product + s_Page + s_Productatt == "":
    saveData_Postcat()
    saveData_Productcat()
    saveData_Post()
    saveData_Product()
    saveData_Page()
    saveData_Productatt()

if s_Postcat != "":
    saveData_Postcat(s_Postcat)

if s_Productcat != "":
    saveData_Productcat(s_Productcat)

if s_Post != "":
    saveData_Post(s_Post)

if s_Product != "":
    saveData_Product(s_Product)
    cat_urls = get_product_cat_id(s_Product)
    for id in cat_urls:
        saveData_Productcat(id)

if s_Page != "":
    saveData_Page(s_Page)

if s_Productatt != "":
    saveData_Productatt(s_Productatt)

print("OK DONE!")