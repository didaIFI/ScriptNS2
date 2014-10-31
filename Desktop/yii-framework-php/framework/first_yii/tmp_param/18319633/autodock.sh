#!/bin/sh
ARG=$1
GPF=$2
DPF=$3
WORK_DIR=`pwd`

buildGrid() {
cd $WORK_DIR/i86Linux2
cp autogrid4 $WORK_DIR/.
}

buildDock() {
cd $WORK_DIR/i86Linux2
cp autodock4 $WORK_DIR/.
}

tar -xvzf $ARG
buildGrid
buildDock
rm -rf i86Linux2
cd $WORK_DIR
#grid() {
#ls *.gpf > fileGPF.txt
#for GPF in `cat fileGPF.txt`
#do
$WORK_DIR/autogrid4 -p $GPF -l ${GPF%%.*}.glg
#tail -n 5 ${GPF%%.*}.glg
#done
#}

#dock() {
#ls ZINC*_*_1OKE.dpf > fileDPF.txt
#for DPF in `cat fileDPF.txt`
#do
$WORK_DIR/autodock4 -p $DPF -l ${DPF%%.*}.dlg
#tail -n 5 ${DPF%%.*}.glg
#done
#}

ulimit -s unlimited
grid
dock

