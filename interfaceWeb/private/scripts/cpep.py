#!/usr/bin/python3.5
# -*-coding:Utf-8 -*

import netifaces
import json

def test():
    tableau = {}
    for interface in netifaces.interfaces():
        try:
            tableau[interface]={}
            a=netifaces.ifaddresses(interface)[netifaces.AF_INET]
            for tab in a:
                tableau[interface]['address'] = tab.get("addr")
                tableau[interface]['netmask'] = tab.get("netmask")
        except KeyError:
            pass
    print(json.dumps(tableau, indent=4))

test()
