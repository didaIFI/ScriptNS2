#!/bin/sh
tar -xvzf file10.tar.gz
/bin/bash autodock.sh autodocksuite-4.2.5.1-i86Linux2.tar.gz ZINC13735135_01_1OKE.dpf
zip DLG *_*_*.dlg
zip GLG *.glg 
zip ZINC13735135_01_1OKE *_*_*.dlg *.glg
tar jcf ZINC13735135_01_1OKE.tar.bz2 *_*_*.*
