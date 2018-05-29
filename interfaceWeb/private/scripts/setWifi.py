#!/usr/bin/python3.5
# -*-coding:Utf-8 -*

import json
import netifaces
import fileinput
import sys

WIFI_FILE = "/etc/hostapd/hostapd.conf"

def get_wifi():
    tableau = {}
    fichier = open(WIFI_FILE,"r")
    for line in fichier.readlines():
        if line[0].isalpha() == True:
            t=line.split("=")
            t[1]=t[1].rstrip('\n')
            tableau[t[0]] = t[1]
    print(json.dumps(tableau, indent=4))
    fichier.close()


def get_interface():
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

def put_wifi(champ,valeur):
    for line in fileinput.input([WIFI_FILE], inplace=True):
        print(line.replace(champ, valeur), end='')


#put_wifi("ssid","oshgofsjgnosfuhjo")
#get_interface()
#get_wifi()

#for arg in sys.argv:
#    print (arg)
put_wifi(sys.argv[1], sys.argv[2])
