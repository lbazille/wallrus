# * * * * * bash /var/www/html/private/scripts/updateFw.sh

echo `date "+%Y-%m-%d %H:%M":%S`": Downloading remote rules..." 

ping -q -W2 -c1 10.56.2.109 > /dev/null
 
if [ $? -eq 0 ]
then
    DistantFile=$(curl https://10.56.2.109 --insecure)
    LocalFile=$(sha1sum /etc/iptables.ipv4.nat | awk '{ print $1 }')

    if [ "$LocalFile" == "$DistantFile" ]; then
        echo `date "+%Y-%m-%d %H:%M":%S`": No modification needed" 
    else
        echo `date "+%Y-%m-%d %H:%M":%S`": Updating local rules" 
        curl https://10.56.2.109/rules --insecure > /etc/iptables.ipv4.nat
        iptables-restore /etc/iptables.ipv4.nat
    fi
else
    echo `date "+%Y-%m-%d %H:%M":%S`": Host unavailable"
fi
