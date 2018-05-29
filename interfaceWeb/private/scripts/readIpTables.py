#!/usr/bin/python3.5
# -*-coding:Utf-8 -*

import json
import fileinput
import os
import subprocess
import re

def get_iptables():
    pkts = ""
    bytes = ""
    type = ""
    target = ""
    prot = ""
    opt = ""
    srcAdr = ""
    srcPort = ""
    destAdr = ""
    destPort = ""
    state = ""
    m = re.search('(?<=abc)def', 'abcdef')

    text = ""
    text = subprocess.check_output(['sudo','/sbin/iptables','-nvL'])

    text = text.split("\n")
    regle = []
    tableau = {}
    compt = 0
    for line in text:
        pkts = ""
        bytes = ""
        prot = ""
        opt = ""
        srcAdr = ""
        srcPort = ""
        destAdr = ""
        destPort = ""
        state = ""
        if(re.search('Chain INPUT',line)):
            type='INPUT'
        if(re.search('Chain FORWARD',line)):
            type='FORWARD'
        if(re.search('Chain OUTPUT',line)):
            type='OUTPUT'

        if(re.search('^[\ ]*[0-9]', line)):
            mot = line.split(" ")
            temp = []
            regle = {}
            for elem in mot:
                if (elem != ''):
                    temp.append(elem)
            taille = len(temp)
            if(temp[0]):
                pkts = temp[0]
            if(temp[1]):
                bytes = temp[1]
            if(temp[2]):
                target = temp[2]
            if(temp[3]):
                prot = temp[3]
            if(temp[4]):
                opt = temp[4]
            if(temp[7]):
                srcAdr = temp[7]
            if(temp[8]):
                destAdr = temp[8]

            for i in range(9,taille):
                if(re.search('RELATED', temp[i])or re.search('ESTABLISHED', temp[i]) or re.search('NEW', temp[i])):
                    state =  temp[i]
                if(re.search('dpt', temp[i])):
                    dp=temp[i].split(':')
                    destPort = dp[1]
                    print(destPort)
                if(re.search('spt', temp[i])):
                    sp=temp[i].split(':')
                    srcPort = sp[1]

            regle['pkts'] = pkts
            regle['bytes'] = bytes
            regle['type'] = type
            regle['target'] = target
            regle['prot'] = prot
            regle['srcAddr'] = srcAdr
            regle['srcPort'] = srcPort
            regle['destAddr'] = destAdr
            regle['destPort'] = destPort
            regle['state'] = state
            tableau[compt] = regle
            compt = compt + 1
    #print(json.dumps(tableau, indent=4))
    jsonFile = open('/var/www/html/private/scripts/rules.json','w')
    jsonFile.write(json.dumps(tableau, indent=4))
    jsonFile.close()

get_iptables();
