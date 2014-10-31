#!/bin/sh
tar -xvzf file10.tar.gz
/bin/bash autodock.sh autodocksuite-4.2.5.1-i86Linux2.tar.gz dpfFile.txt
zip DLG *_*_*.dlg
zip GLG *.glg 
zip dpfFile *_*_*.dlg
tar jcf dpfFile.tar.bz2 *_*_*.*
