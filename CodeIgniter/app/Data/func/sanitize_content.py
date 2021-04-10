# -*- coding: utf-8 -*-
from func.import_lib import *
from func.get_env import *

WPDOMAIN = getENV("WPDOMAIN")
DOMAIN = getENV("DOMAIN")

def trueLink(content):
    WPDOMAIN_HTTPS = "https://" + WPDOMAIN
    DOMAIN_HTTPS = "https://" + DOMAIN
    WPDOMAIN_HTTP = "http://" + WPDOMAIN
    DOMAIN_HTTP = "http://" + DOMAIN
    WPDOMAIN_SJSON = r"https:\/\/" + WPDOMAIN
    DOMAIN_SJSON = r"https:\/\/" + DOMAIN
    WPDOMAIN_JSON = r"http:\/\/" + WPDOMAIN
    DOMAIN_JSON = r"http:\/\/" + DOMAIN

    content = content.strip()
    content = content.replace(WPDOMAIN_HTTPS, DOMAIN_HTTPS)
    content = content.replace(WPDOMAIN_HTTP, DOMAIN_HTTP)
    content = content.replace(WPDOMAIN_SJSON, DOMAIN_SJSON)
    content = content.replace(WPDOMAIN_JSON, DOMAIN_JSON)

    return content

def reverse_trueLink(content):
    WPDOMAIN_HTTPS = "https://" + WPDOMAIN
    DOMAIN_HTTPS = "https://" + DOMAIN
    WPDOMAIN_HTTP = "http://" + WPDOMAIN
    DOMAIN_HTTP = "http://" + DOMAIN
    WPDOMAIN_SJSON = r"https:\/\/" + WPDOMAIN
    DOMAIN_SJSON = r"https:\/\/" + DOMAIN
    WPDOMAIN_JSON = r"http:\/\/" + WPDOMAIN
    DOMAIN_JSON = r"http:\/\/" + DOMAIN

    content = content.strip()
    content = content.replace(DOMAIN_HTTPS, WPDOMAIN_HTTPS)
    content = content.replace(DOMAIN_HTTP, WPDOMAIN_HTTP)
    content = content.replace(DOMAIN_SJSON, WPDOMAIN_SJSON)
    content = content.replace(DOMAIN_JSON, WPDOMAIN_JSON)

    return content