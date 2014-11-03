#!/bin/sh
WORK_DIR="/home/dida/DIRAC"
DIRAC_DIR="/home/dida/DIRAC/scripts"
DIR=`pwd`
FILE_DPF=$1
FILE_DIR=$WORK_DIR/$FILE_DPF
mkdir -p $WORK_DIR/${FILE_DPF%%.*}
for DPF in `cat $FILE_DIR`
do
cat << EOF > $WORK_DIR/${FILE_DPF%%.*}/${DPF%%.*}.sh
#!/bin/sh
tar -xvzf file10.tar.gz
/bin/bash autodock.sh autodocksuite-4.2.5.1-i86Linux2.tar.gz $DPF
zip DLG *_*_*.dlg
zip GLG *.glg 
zip ${DPF%%.*} *_*_*.dlg *.glg
tar jcf ${DPF%%.*}.tar.bz2 *_*_*.*
EOF
done
#build jdl
for DPF in `cat $FILE_DIR`
do
cat << EOF > $WORK_DIR/${FILE_DPF%%.*}/${DPF%%.*}.jdl
JobName = "docking_biomedP";
Executable = "${DPF%%.*}.sh";
StdOutput = {"${DPF%%.*}.out"};
StdError = {"${DPF%%.*}.err"};
InputSandbox = {"${DPF%%.*}.sh", "LFN:/biomed/user/l/louacheni/file10.tar.gz"};
OutputSandbox = {"${DPF%%.*}.out", "${DPF%%.*}.err","${DPF%%.*}.dlg",  "DLG.zip", "GLG.zip", "${DPF%%.*}.zip", "${DPF%%.*}.tar.bz2"};
EOF
done
#submit JOB
cd $WORK_DIR/${FILE_DPF%%.*}
ls *.jdl >  fileJDL.txt
for JDL in `cat fileJDL.txt`
do
$DIRAC_DIR/dirac-wms-job-submit $JDL >> jobIDOct.txt
done
for JOB in `cat jobIDOct.txt | cut -d " " -f3`
do
$DIRAC_DIR/dirac-wms-job-status $JOB >> jobStatus.txt
jobStat=`$DIRAC_DIR/dirac-wms-job-status $JOB | cut -d " " -f2 | cut -d "=" -f2 | cut -d ";" -f1`
echo $jobStat
while test $jobStat != 'Done'
do
jobStat=`$DIRAC_DIR/dirac-wms-job-status $JOB | cut -d " " -f2 | cut -d "=" -f2 | cut -d ";" -f1`
done
jobpath=`$DIRAC_DIR/dirac-wms-job-get-output $JOB`
echo $jobpath 
cp $DIR/${FILE_DPF%%.*}/$JOB/*.zip $DIR/${FILE_DPF%%.*}/
done
mkdir -p /var/www/yii-framework-php/framework/first_yii/tmp_param/${FILE_DPF%%.*}
mv *.zip /var/www/yii-framework-php/framework/first_yii/tmp_param/${FILE_DPF%%.*}
zip /var/www/yii-framework-php/framework/first_yii/tmp_param/${FILE_DPF%%.*} /var/www/yii-framework-php/framework/first_yii/tmp_param/${FILE_DPF%%.*}
grid=`$DIRAC/scripts/dirac-dms-add-file LFN:/biomed/user/l/louacheni/${FILE_DPF%%.*}.zip  /var/www/yii-framework-php/framework/first_yii/tmp_param/${FILE_DPF%%.*}.zip  DIRAC-USER`
echo $grid
#/bin/bash submitJDL.sh 
#/bin/bash getOut.sh

