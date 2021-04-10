# -*- coding: utf-8 -*-

from func2.save_data_web import *

product_id = 3658
productlink = "https://wp.daquyanan.com/vat-pham-phong-thuy/bi-da-test/"

product_cats = getData_product(productlink)["category"]
print(product_cats)