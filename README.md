# Wallrus
Secure home-made router for general public or small enterprises.

## Context
This project was realised during our infosec studies. 

The aim was to realize a small firewall destinated to general public and small enterprises. It must be simple to use (no configuration by the client) and work with a centralized architecture to collect the logs of all the clients. We're also able to put firewall rules to all our clients to protect them of the malicious websites in internet.

## Realisation
### Centralized architecture
We use a cluster of Proxmox servers to virtualize our services. 

The configuration of the cluster is:
* 32 GB of RAM
* 2 x Intel Core 3.5GHz CPU
* 4 x 500 GB hard-drive
* 2 virtual networks : 10.56.1.0/24 and 10.56.2.0/24

### Box components
We are using Raspberry Pi 3 to simulate boxes.
The OS is Raspbian (Debian Stretch) and we use Ethernet adapter as WAN port and WiFi for the LAN network.

The following services are installed on the box:
* HostAPd (WiFi Access Point)
* DHCP Server
* IPtables (Firewall)
* IPsec VPN client
* Splunk Forwarder
* Apache and PHP (web interface)

